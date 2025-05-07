#include <ESP8266WiFi.h>
#include <Servo.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "Ero";
const char* password = "nganingani";

const char* checkURL = "http://192.168.215.199/pet_feeder_final_boss/check_feed.php";
const char* resetURL = "http://192.168.215.199/pet_feeder_final_boss/reset_feed.php";

Servo myservo;

void setup() {
  Serial.begin(115200);
  myservo.attach(D4); // or D4, depending on your wiring

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("\nConnected to WiFi!");
}

void loop() {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    WiFiClient client;

    http.begin(client, checkURL);
    int httpCode = http.GET();

    if (httpCode == 200) {
      String payload = http.getString();
      Serial.println("Feed status: " + payload);

      if (payload == "1") {
        // Feed!
        Serial.println("Feeding now...");
        myservo.write(0);   // Move to 0 degrees
    delay(1000);
    myservo.write(90);  // Move to 90 degrees
    delay(1000);
    myservo.write(0);   // Move back
    delay(1000);

        // Reset feed status
        http.end();
        http.begin(client, resetURL);
        http.GET();  // We don't care about response
        http.end();
      }
    } else {
      Serial.println("HTTP error code: " + String(httpCode));
    }
    http.end();
  }

  delay(5000); // check every 5 seconds
}
