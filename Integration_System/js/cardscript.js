$(document).ready(function () {
  $(".wrapper").css("margin-top", ($(window).height()) / 5);
  //DATE AND TIME//
  //Converted into days, months, hours, day-name, AM/PM
  var dt = new Date()
  var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
  $('#day').html(days[dt.getDay()]);
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
  $('#date').html(months[dt.getMonth()] + " " + dt.getDate() + ", " + dt.getFullYear());
  $('#time').html((dt.getHours() > 12 ? (dt.getHours() - 12) : dt.getHours()).toString() + ":" + ((dt.getMinutes() < 10 ? '0' : '').toString() + dt.getMinutes().toString()) + (dt.getHours() < 12 ? ' AM' : ' PM').toString());

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyBLyDvcdoDPtU7Tlm7Yr404ARLQtxhJxF4",
    authDomain: "integration-6b7c3.firebaseapp.com",
    projectId: "integration-6b7c3",
    databaseURL: "https://integration-6b7c3-default-rtdb.firebaseio.com/",
    storageBucket: "integration-6b7c3.appspot.com",
    messagingSenderId: "686490027154",
    appId: "1:686490027154:web:1bb53c1512b43a0aee924b",
    measurementId: "G-39BMXGJ91S"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  $(document).ready(function () {
    var database = firebase.database();
    var suhu;
    var humidity;
    var hujan;
    var cahaya;
    var lampu;

    database.ref("SENSOR").on("value", function (snap) {
      suhu = snap.val().Temperature;
      humidity = snap.val().Humidity;
      hujan = snap.val().Rain;
      cahaya = snap.val().Light;
      lampu = snap.val().led;

      document.getElementById("Suhu").innerHTML = suhu;
      document.getElementById("Humidity").innerHTML = humidity;
      document.getElementById("Hujan").innerHTML = hujan;
      document.getElementById("Cahaya").innerHTML = cahaya;
      document.getElementById("LED").innerHTML = lampu;
    });

  });
});