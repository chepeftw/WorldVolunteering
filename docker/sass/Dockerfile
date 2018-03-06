FROM alpine:3.2

ENV BUILD_PACKAGES ruby-dev build-base ca-certificates
ENV RUBY_PACKAGES ruby

RUN apk update && \
    apk upgrade && \
    apk add $BUILD_PACKAGES && \
    apk add $RUBY_PACKAGES && \
    rm -rf /var/cache/apk/*

RUN gem install sass