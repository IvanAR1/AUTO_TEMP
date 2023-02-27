#include "DHT11.h";
#include "ESP8266.h";

void setup()
{ 
  Serial.begin(115200);
  setup_dht11();
  setup_esp8266(tiempo_inicial);
}

void loop()
{
  long tiempo_espera = millis() - tiempo_inicial;
  if (tiempo_espera > (17 * 1000)) 
  {
    float temperatura = leer_temperatura();
    float humedad = leer_humedad();
    mandar_datos(temperatura, humedad);
    tiempo_inicial = millis(); //Después de enviar los datos, se espera unos 15 segundos para volver a enviar
  }
}