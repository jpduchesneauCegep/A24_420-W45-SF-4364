FROM httpd:alpine

RUN apk update; \
	apk upgrade;

RUN mkdir /srv/htdocs

EXPOSE 80 443

WORKDIR /usr/local/apache2/conf

COPY ./certs/server.* ./
COPY ./conf/httpd.conf httpd.conf
COPY ./conf/extra/httpd-ssl.conf extra/httpd-ssl.conf
