# php-vitexsoftware-ease-bootstrap5-widgets-abraflexi
![Project Logo](php-vitexsoftware-ease-bootstrap5-widgets-abraflexi.svg?raw=true "Project Logo")

[![Latest Stable Version](https://poser.pugx.org/vitexsoftware/ease-twbootstrap5-widgets-abraflexi/v)](//packagist.org/packages/vitexsoftware/ease-twbootstrap5-widgets-abraflexi) 
[![Total Downloads](https://poser.pugx.org/vitexsoftware/ease-twbootstrap5-widgets-abraflexi/downloads)](//packagist.org/packages/vitexsoftware/ease-twbootstrap5-widgets-abraflexi) 
[![Latest Unstable Version](https://poser.pugx.org/vitexsoftware/ease-twbootstrap5-widgets-abraflexi/v/unstable)](//packagist.org/packages/vitexsoftware/ease-twbootstrap5-widgets-abraflexi) 
[![License](https://poser.pugx.org/vitexsoftware/ease-twbootstrap5-widgets-abraflexi/license)](//packagist.org/packages/vitexsoftware/ease-twbootstrap5-widgets-abraflexi)
[![Monthly Downloads](https://poser.pugx.org/vitexsoftware/ease-twbootstrap5-widgets-abraflexi/d/monthly)](//packagist.org/packages/vitexsoftware/ease-twbootstrap5-widgets-abraflexi)
[![Dependents](https://poser.pugx.org/vitexsoftware/ease-twbootstrap5-widgets-abraflexi/dependents)](//packagist.org/packages/vitexsoftware/ease-twbootstrap5-widgets-abraflexi)
[![wakatime](https://wakatime.com/badge/user/5abba9ca-813e-43ac-9b5f-b1cfdf3dc1c7/project/79f509f9-fcfc-4105-8e2b-fedd3fc93142.svg)](https://wakatime.com/badge/user/5abba9ca-813e-43ac-9b5f-b1cfdf3dc1c7/project/79f509f9-fcfc-4105-8e2b-fedd3fc93142)

TwitterBootstrap5 Widgets for [php-abraflexi](https://github.com/Spoje-NET/php-abraflexi) Library for Abraflexi with EasePHP Framework widgets


Instalace
----------

```shell
    composer require vitexsoftware/ease-twbootstrap5-widgets-abraflexi
```

![Install](install.png?raw=true)

### Classes in `AbraFlexi\ui\TWB5`:

| File                                                                                      | Description                                                                 |
| ----------------------------------------------------------------------------------------- | --------------------------------------------------------------------------- |
| [AbraFlexiLogo.php](src/AbraFlexi/ui/TWB5/AbraFlexiLogo.php)                             | AbraFlexi Logo (SVG, base64-embedded)                                       |
| [AdresarForm.php](src/AbraFlexi/ui/TWB5/AdresarForm.php)                                 | Address book item edit form                                                 |
| [CompanyLogo.php](src/AbraFlexi/ui/TWB5/CompanyLogo.php)                                 | Company Logo fetched from AbraFlexi                                         |
| [ConnectionForm.php](src/AbraFlexi/ui/TWB5/ConnectionForm.php)                           | Form for entering AbraFlexi connection details                              |
| [DocumentLink.php](src/AbraFlexi/ui/TWB5/DocumentLink.php)                               | Link to a document in the AbraFlexi web interface                           |
| [EmbedResponsive.php](src/AbraFlexi/ui/TWB5/EmbedResponsive.php)                         | Responsive embed base class                                                 |
| [EmbedResponsiveHTML.php](src/AbraFlexi/ui/TWB5/EmbedResponsiveHTML.php)                 | Embed an HTML document on the page                                          |
| [EmbedResponsivePDF.php](src/AbraFlexi/ui/TWB5/EmbedResponsivePDF.php)                   | Embed a PDF document on the page                                            |
| [RecordChooser.php](src/AbraFlexi/ui/TWB5/RecordChooser.php)                             | Text input for selecting a record via [Selectize.js](https://selectize.github.io/selectize.js/) |
| [RecordSelector.php](src/AbraFlexi/ui/TWB5/RecordSelector.php)                           | Select dropdown for picking a record via [Selectize.js](https://selectize.github.io/selectize.js/) |
| [RecordTypeSelect.php](src/AbraFlexi/ui/TWB5/RecordTypeSelect.php)                       | Dropdown for selecting AbraFlexi evidence/document type                     |
| [SearchBox.php](src/AbraFlexi/ui/TWB5/SearchBox.php)                                     | Search input with datalist autocomplete                                     |
| [StatusInfoBox.php](src/AbraFlexi/ui/TWB5/StatusInfoBox.php)                             | Connection status info box                                                  |


Examples in the [Examples](Examples) folder
===========================================

Company Logo: [companylogo.php](Examples/companylogo.php)

![Logo](Examples/companylogo.png?raw=true)

Address Editor: [addresseditor.php](Examples/addresseditor.php)

![Output](Examples/addresseditor.png?raw=true)

Invoice listing on the page: [invoices.php](Examples/invoices.php)

![Output](Examples/invoices.png?raw=true)

Embedding PDF on the page: [embed.php](Examples/embed.php)

![Embedding](Examples/embed.png?raw=true)

Retrieving document from AbraFlexi and sending it to the browser: [getpdf.php](Examples/getpdf.php)

Form for entering AbraFlexi login details and displaying whether the connection was successful: [statussignin.php](Examples/statussignin.php)

![Connection Test](Examples/statussignin.png?raw=true)


Custom button installer [buttonInstaller](src/buttonInstaller.php)

![Custom Button Installer](Examples/buttoninstaller.png?raw=true)


Debian/Ubuntu
-------------

For Linux, .deb packages are available. Please use the repo:


```shell
sudo apt install lsb-release wget apt-transport-https bzip2

wget -qO- https://repo.vitexsoftware.com/keyring.gpg | sudo tee /etc/apt/trusted.gpg.d/vitexsoftware.gpg
echo "deb [signed-by=/etc/apt/trusted.gpg.d/vitexsoftware.gpg]  https://repo.vitexsoftware.com  $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/vitexsoftware.list
sudo apt update
sudo apt install php-vitexsoftware-ease-bootstrap5-widgets-abraflexi
```
