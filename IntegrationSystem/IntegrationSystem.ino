#include <ESP8266WiFi.h>                                               
#include <FirebaseESP8266.h>
#include <dht.h>                                        
#include <Servo.h>

#define FIREBASE_HOST "integration-6b7c3-default-rtdb.firebaseio.com/"              // the project name address from firebase id
#define FIREBASE_AUTH "WrFnC8o2DJLwqyR3kNcsCV4qcwjQNNWsjj7Fsiw8"       // the secret key generated from firebase
#define WIFI_SSID "HOTSPOT"                                          
#define WIFI_PASSWORD "Dasta312"                                  
 
#define DHT11_PIN 2                                            // Digital pin connected to DHT11                                        // Initialize dht type as DHT 11
dht DHT;   
Servo myservo;

int hujan;
int tutup = 180;
int buka = 0;
const int ledPin = 4;     // This is GPIO4 pin which is labeled as D2 on NodeMCU
const int ldrPin = D0;    // LDR data pin connected to Analog pin 0
const int ledHujan = 14;     // This is GPIO14 pin which is labeled as D5 on NodeMCU
const int led = 5;

FirebaseData firebaseData;
FirebaseData ledData;
 
void setup() 
{
  Serial.begin(9600);
  myservo.attach(D6);
  pinMode(A0, INPUT);
  pinMode(ledHujan, OUTPUT);
  pinMode(ledPin, OUTPUT);     
  pinMode(ldrPin, INPUT); 
  pinMode(led, OUTPUT); //reads dht sensor data 
               
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);                                  
  Serial.print("Connecting to ");
  Serial.print(WIFI_SSID);
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }
 
  Serial.println();
  Serial.print("Connected");
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());                               //prints local IP address
  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);                 // connect to the firebase
  
}
 
void loop() 
{
  sensorSuhu();
  sensorHujan();
  sensorCahaya();

  if (Firebase.getString(ledData, "/SENSOR/led")){
    Serial.println(ledData.stringData());
    if (ledData.stringData() == "1") {
    digitalWrite(led, HIGH);
    }
  else if (ledData.stringData() == "0"){
    digitalWrite(led, LOW);
    }
  }
  delay(100);
}

void sensorSuhu(){
  int chk = DHT.read11(DHT11_PIN);
  float h = DHT.humidity;                                 // Read Humidity
  float t = DHT.temperature;                              // Read temperature
  
  if (isnan(h) || isnan(t))                                     // Checking sensor working
  {                                   
    Serial.println(F("Failed to read from DHT sensor!"));
    return;
  } 
  Serial.print("Humidity: ");  
  Serial.print(h);
  String fireHumid = String(h) + String("%");                   //Humidity integer to string conversion
  
  Serial.print("%  Temperature: ");  
  Serial.print(t);  
  Serial.println("°C ");
  String fireTemp = String(t) + String("°C");                  //Temperature integer to string conversion
  delay(100);
 
 
  if (Firebase.setFloat(firebaseData, "/SENSOR/Temperature", t)){
    Serial.println("Suhu terkirim");
  } else{
    Serial.println("Suhu tidak terkirim");
    Serial.println("Karena : "+ firebaseData.errorReason());
  }
  if (Firebase.setFloat(firebaseData, "/SENSOR/Humidity", h)){
    Serial.println("Suhu terkirim");
  } else{
    Serial.println("Suhu tidak terkirim");
    Serial.println("Karena : "+ firebaseData.errorReason());
  }
  delay(10);
  return;
}

void sensorHujan(){
  int rainSensor = analogRead(A0);
  rainSensor = map(rainSensor, 0, 1023, 0, 100);
  Serial.print("Rain : ");
  Serial.println(rainSensor);

  String hujan = "YES";
  String noHujan = "NO";
  
  if(rainSensor<90){
    Serial.println("Sekarang Hujan");
    delay(100);
    myservo.write(tutup);                       // waits 15 ms for the servo to reach the position
    digitalWrite(ledHujan, HIGH);
    delay(100);
    if (Firebase.setString(firebaseData, "/SENSOR/Rain", hujan)){
      Serial.println("Status Hujan terkirim");
    } else{
      Serial.println("Status Hujan tidak terkirim");
      Serial.println("Karena : "+ firebaseData.errorReason());
    }
  }
  
   
  else {
     Serial.println("Tidak Hujan");
     delay(100);
     myservo.write(buka);                       // waits 15 ms for the servo to reach the position
     digitalWrite(ledHujan, LOW);
     delay(100);
     if (Firebase.setString(firebaseData, "/SENSOR/Rain", noHujan)){
      Serial.println("Status Hujan terkirim");
     } else{
      Serial.println("Status Hujan tidak terkirim");
      Serial.println("Karena : "+ firebaseData.errorReason());
      } 
    }
}

void sensorCahaya(){
  bool ldrStatus = digitalRead(ldrPin);
  Serial.print("LDR : ");
  Serial.println(ldrStatus);

  String gelap = "Gelap!";
  String terang = "Terang";
  
  if (ldrStatus==1) {     //if the value of buzzer goes higher and equal to 20 then buzzer will beep else no
    digitalWrite(ledPin, HIGH);
    Serial.println("Gelap! Lampu nyala");
    delay(100);
    if (Firebase.setString(firebaseData, "/SENSOR/Light", gelap)){
    Serial.println("Status Cahaya terkirim");
  } else{
    Serial.println("Status Cahaya tidak terkirim");
    Serial.println("Karena : "+ firebaseData.errorReason());
  }
    
  }else {
    digitalWrite(ledPin, LOW);
    Serial.println("Terang! Lampu mati");
    delay(100);
    if (Firebase.setString(firebaseData, "/SENSOR/Light", terang)){
    Serial.println("Status Cahaya terkirim");
  } else{
    Serial.println("Status Cahaya tidak terkirim");
    Serial.println("Karena : "+ firebaseData.errorReason());
  }
    }
}
