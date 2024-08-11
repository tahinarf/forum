# Utiliser une image PHP comme base
FROM php:7.4-apache

# Copier les fichiers du projet vers le dossier htdocs de l'image Docker
COPY . /var/www/html

# Installer les extensions PHP requises (si nécessaire)
RUN docker-php-ext-install mysqli

# Exposer le port 80 pour le serveur web
EXPOSE 80
