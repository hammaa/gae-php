FROM gcr.io/google-appengine/php56

ENV DOCUMENT_ROOT /app

# Libs
RUN apt-get install wget -y
# Test Libs
RUN apt-get install vim -y

# PHP-FPM link
RUN ln -s /opt/php/sbin/php-fpm /usr/bin/php-fpm
#RUN ln -s /opt/php/bin/php-enmod /usr/bin/phpenmod

# Install WhaTap
#RUN wget http://repo.whatap.io/debian/release.gpg -O -| apt-key add -
#RUN wget http://repo.whatap.io/debian/whatap-repo_1.0_all.deb

# Staging
RUN wget http://210.122.10.41/debian/release.gpg -O -| apt-key add -
RUN wget http://210.122.10.41/debian/whatap-repo_1.0_all.deb

RUN dpkg -i whatap-repo_1.0_all.deb
RUN apt-get update
RUN apt-get install whatap-php

RUN (echo "x8icm12rh0rf2-x6lljrb6acm5lc-z7l3k2ckcvnaei"; echo "210.122.38.129")|/usr/whatap/php/install.sh

# add supervisor/conf.d/whatap.conf
RUN echo "[program:whatap-php]" >> /etc/supervisor/conf.d/whatap.conf
RUN echo "command = /etc/init.d/whatap-php start" >> /etc/supervisor/conf.d/whatap.conf
RUN echo "stdout_logfile = /dev/stdout" >> /etc/supervisor/conf.d/whatap.conf
RUN echo "stdout_logfile_maxbytes=0" >> /etc/supervisor/conf.d/whatap.conf
RUN echo "stderr_logfile = /dev/stderr" >> /etc/supervisor/conf.d/whatap.conf
RUN echo "stderr_logfile_maxbytes=0" >> /etc/supervisor/conf.d/whatap.conf
RUN echo "user = root" >> /etc/supervisor/conf.d/whatap.conf
RUN echo "autostart = true" >> /etc/supervisor/conf.d/whatap.conf
RUN echo "autorestart = true" >> /etc/supervisor/conf.d/whatap.conf
RUN echo "priority = 10" >> /etc/supervisor/conf.d/whatap.conf



# Cloud SQL
# Install the Cloud SQL proxy
RUN wget https://dl.google.com/cloudsql/cloud_sql_proxy.linux.amd64 -O cloud_sql_proxy
RUN chmod +x cloud_sql_proxy
# Run the proxy:
RUN mkdir /cloudsql; chmod 777 /cloudsql
RUN ./cloud_sql_proxy -dir=/cloudsql &


# Composer install
#RUN composer install

