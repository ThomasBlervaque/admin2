FROM ubuntu:latest

RUN apt update && apt full-upgrade -y && \
    apt install bind9 bind9utils dnsutils net-tools nano -y

COPY named.conf /etc/bind/named.conf
COPY mmes-3.zone /etc/bind/zones/mmes-3.zone


EXPOSE 53/udp
EXPOSE 53/tcp

VOLUME /etc/bind

CMD ["named", "-c", "/etc/bind/named.conf", "-g"]