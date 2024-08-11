<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Instalación

## Instalar gestor de paquetes windows chocolatey

Hacer uso de powershell con permisos de administrador e insertar los siguientes comandos:

Set-ExecutionPolicy Bypass -Scope Process -Force; `
[System.Net.ServicePointManager]::SecurityProtocol = `
[System.Net.ServicePointManager]::SecurityProtocol -bor 3072; `
iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))


## Instalar make para automatizar todo el proceso de instalación del docker

choco install make  (Powershell con permisos de administrador)

## Crear docker

En powershell dentro del proyecto ingresar el siguiente comando:

make set up



