#include <Arduino.h>
#include <stdlib.h>
#include "DHT11.h"

#define SSID "PAGA TU INTERNET" //"Nombre del wifi"
#define PASSWORD "FB1240598"  //"Contraseña del wifi"
#define IP "184.106.153.149"  //IP de la url a mandar datos
String API_key = "3WC4SWMU169IY5H5";
boolean relay1_st = false; 
boolean relay2_st = false;
boolean error;
unsigned char conexion_verificada = 0;
unsigned char tiempo_verificado = 0;

void setup_esp8266(long tiempo_inicial)
{
  tiempo_inicial = millis(); 
  Serial.println("AT+RST");
  delay(2000);
  Serial.println("Conectando a internet");
  while(conexion_verificada == 0)
  {
    Serial.print(".");
    String comando = "AT+CWJAP=\"";
    comando += SSID;
    comando += "\",\"";
    comando += PASSWORD;
    comando += "\"\r\n";
    Serial.print(comando);
    Serial.setTimeout(5000);
    if(Serial.find("WIFI CONNECTED\r\n")==1)
    {
      Serial.println("¡CONEXIÓN ESTABLECIDA CORRECTAMENTE!");
      break;
    }
    tiempo_verificado++;
    if(tiempo_verificado > 3) 
    {
      tiempo_verificado = 0;
      Serial.println("Intentando reconectar...");
    }
  }
}

void mandar_datos(float field1, float field2)
{
  Serial.flush();
  String comando = "AT+CIPSTART=\"TCP\",\"";
  comando += IP; //IP a enviar datos
  comando += "\",80";
  Serial.print("Iniciando comandos: ");
  Serial.println(comando);

  if(Serial.find("Error"))
  {
    Serial.println("AT+CIPSTART error");
    return;
  }
  
  String conseguir_url = "GET /update?api_key=";
  conseguir_url += API_key;
  conseguir_url +="&field1=";
  conseguir_url += String(field1);
  conseguir_url +="&field2=";
  conseguir_url += String(field2);
  conseguir_url += "\r\n";
  String comando2 = "AT+CIPSEND=";
  comando2 += String(conseguir_url.length());
  Serial.println(comando2);
  if(Serial.find(">"))
  {
    Serial.println(conseguir_url);
    delay(500);
    String mensaje_cuerpo = "";
    while(Serial.available()) 
    {
      String linea = Serial.readStringUntil('\n');
      if (linea.length() == 1) 
      { 
        mensaje_cuerpo = Serial.readStringUntil('\n');
      }
    }
    Serial.print("Mensage recibido: ");
    Serial.println(mensaje_cuerpo);
    return mensaje_cuerpo;
  }
  else
  {
    Serial.println("AT+CIPCLOSE");
  } 
}
