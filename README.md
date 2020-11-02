# Kursen Webbutveckling III(DT173G), Projekt REST-webbtjänster

## Syfte

Syftet med en REST_API är att det är platsformsoberoende.
Denna tjänst kan anropas om man vill få information om utbildning,erfarenhet eller webbsidor.
Denna tjänst använder JSON format genomgående dvs alla data som man skickar in är json och lika så returerad data är också i json. 

### Description

Denna fil representerar ett REST-API som stöder följande metoder GET, POST,PUT och DELETE.
Jag har använt Advanced Rest client(ARC) för testa att alla metoder i REST-API
fungerar som de ska. I REST-API php filen undersöker man vilken metod som man skickade requested med(GET,POST,PUT eller DELETE)

GET beskrivning.
Om man vill hämta alla individer angen någon av dessa tre uler
https://studenter.miun.se/~tojo8500/dt173g/projekt/rest/education{?id=x}
https://studenter.miun.se/~tojo8500/dt173g/projekt/rest/experience{?id=x}
https://studenter.miun.se/~tojo8500/dt173g/projekt/rest/webbsite{?id=x}

Om man i stället vill hämta en unik individ från någon av dessa tre lägger man på en query string på slutet genom att skriva ?id=x där x anger individens id.

POST beskrivning
   POST används när man ska lägga in nya individer i databasen
   Localhost
      http://localhost:8080/DT173G_PRJ_RESTAPI {/education, /experience,/wdebbsite}
   MIUN
      https://studenter.miun.se/~tojo8500/dt173g/projekt/rest  {/education, /experience,/wdebbsite}
   
När man anger POST med en body kommer POST delen i php filen att köras.
Man läser ut informationen från body och lägger till en ny individ i databasen


PUT beskrivning. x är id på individen
   PUT används när man ska uppdatera en individ i databasen
   Localhost
      http://localhost:8080/DT173G_PRJ_RESTAPI {/education?id=x, /experience?id=x,/wdebbsite?id=x}
   MIUN
      https://studenter.miun.se/~tojo8500/dt173g/projekt/rest  {/education?id=x, /experience?id=x,/wdebbsite?id=x}
När man anger PUT med en query string och body kommer PUT delen i php filen att köras.
Man läser ut informationen från body och id och uppdaterar denna individ i databasen

DELETET beskrivning.  x är id på individen
   DETETE används när vi ska redera en individ från databasen
      http://localhost:8080/DT173G_PRJ_RESTAPI {/education?id=x, /experience?id=x,/wdebbsite?id=x}
   MIUN
      https://studenter.miun.se/~tojo8500/dt173g/projekt/rest  {/education?id=x, /experience?id=x,/wdebbsite?id=x}

När man anger DELETE med en query string kommer DELETE delen i php filen att köras.
Man läser ut vilket id det är och raderar detta id från databasen

I config filen har jag all information som behövs för att kunna ansluta till databasen

Jag har fyra stycken filer för att hantera databasen
1. database.php för att ansluta till databasen
2. education.php hanterar alla sql anrop som används för utbildning
3. experience.php hanterar alla sql anrop som används för erfarenhet
4. webbsite.php hanterar alla sql anrop som används för webbplatsen

I denna REST-API fil används ingen JavaScript
Jag har konfigurerat htaccess så att man inte behöver ange extension php

## Installation

En installation av remote repository går till på följande sätt.

1. git clone https://github.com/tonytojo/DT173G_proj_restapi.git DT173G_proj_restapi
2. cd DT173G_proj_restapi

