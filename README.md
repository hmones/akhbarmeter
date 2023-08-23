![AkhbarMeter Logo](https://akhbarmeter.org/themes/mediameter/assets/images/logo-ar-dark.png)

[MediaMeter (AkhbarMeter)](https://akhbarmeter.org) is one of the first dynamic digital media observatory in Egypt and the world, which rank news agencies according to their adherance to ethical and processional media standards. MediaMeter, is a youth-led initiative developed by Egyptians. The initiative started in 2014 in response to increasing use of media to spread fear among citizens, manipulate the public and polarize society.

The website is built using Laravel.

[![License: CC BY-NC-ND 4.0](https://img.shields.io/badge/License-CC%20BY--NC--ND%204.0-lightgrey.svg)](https://creativecommons.org/licenses/by-nc-nd/4.0/)

### What do we currently do

MediaMeter (AkhbarMeter) currently operates in Egypt. The project monitors and assesses the truthfulness and professionalism of the top ten online news agencies based on Alexa and SimilarWeb rankings. Reviewers assess articles from the digital news agencies based on several methodological questions developed in consultation with various international fact-checking experts and which can be modified in the code making it easily deployed in other settings. The questions fall under three broad categories of professionalism, manipulation, and violations to human rights. Specific questions include whether the article conceals information, contains false information, uses photos to manipulate facts, cites sources representing different views, reflects bias by the author, contains hate speech, negatively profiles members of certain groups, and more. Assessed articles are posted on the website (https://akhbarmeter.org/) along with responses to the questions described above. Each reviewed article is marked with an icon that provides a score out of 100% on how professional and truthful it is. If the article contains false or misinformation, the icon is marked accordingly to warn readers. MediaMeter staff often contact authors of reviewed articles to give them a chance to respond to the evaluation and offer to publish their responses on the article’s page on the website.

### Support the project

We need your help to stay independent and to produce more content, and also to help others deploy their version of the project in their respective country. Our project welcomes your support with whatever you can. This could help us become sustainable and create more impact.

[![Support us on Patron](https://akhbarmeter.org/themes/mediameter/assets/images/patron.png)](https://www.patreon.com/akhbarmeter).

### Development Team

AkhbarMeter was created by Egyptian developers who believe in digital participation and who both continue to develop the platform.


### Contact

You can communicate with us using the following mediums:

* [Follow us on Twitter](http://twitter.com/akhbarmeter) for announcements and updates.
* [Follow us on Facebook](http://facebook.com/akhbarmeter) for announcements and updates.
* [Follow us on Instagram](http://instagram.com/akhbarmeter) for announcements and updates.
* [Send us email](mailto:akhbarmeter@gmail.com) for further cooperation.

### License

The platform is open-sourced software licensed under [CC BY-NC-ND 4.0 License](https://creativecommons.org/licenses/by-nc-nd/4.0/)



### For Development

1. Make sure the current php version is 8.1 `sudo update-alternatives --config php` and choose 8.1
2. Install composer 2.0 globally and run composer install from the root directory
3. Give proper permissions to the storage folder by running `chmod -R 777 storage/logs` && `chmod -R 775 storage/framework/`
4. Copy the env file and modify it: `cp .env.example .env`
5. Run the docker containers: `vendor/bin/sail up`
6. Create an application key: `vendor/bin/sail artisan key:generate`
7. Make sure the database is created by visiting the container `docker compose exec mysql mysql -uUSERNAME -pPASSWORD` and if not make a new database
8. Run the migrations `vendor/bin/sail artisan migrate --seed`
