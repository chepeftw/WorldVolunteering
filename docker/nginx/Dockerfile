FROM alpine:3.4

RUN apk add --update nginx && rm -rf /var/cache/apk/* && rm -rf /tmp/*

COPY nginx.conf /etc/nginx/

RUN adduser -D -g '' -G www-data www-data

CMD ["nginx"]

EXPOSE 80
