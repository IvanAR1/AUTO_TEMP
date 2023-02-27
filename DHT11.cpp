#include <Arduino.h>
#include <DHT.h>

#define DHT_PIN 2 //Datos del DHT conectados al puerto del Arduino (por default, 2)
#define DHT_TIPO DHT11 //DHT11 (Tipo de sensor de DHT)
DHT dht(DHT_PIN, DHT_TIPO,11); //Inicia la detección del sensor DHT
float humedad, temperatura_centigrados; //Datos a conseguir

void setup_dht11()
{
  dht.begin();
}

float leer_temperatura()
{
  return dht.readTemperature();
}

float leer_humedad(void)
{
  return dht.readHumidity();
}