FROM debian

RUN apt update && apt full-upgrade -y && \
    apt install bind9 bind9utils dnsutils net-tools nano -y

COPY named.conf /etc/bind/named.conf
COPY db.mmes-3 /etc/bind/db.mmes-3

EXPOSE 53/udp
EXPOSE 53/tcp
EXPOSE 953/udp
EXPOSE 953/tcp

VOLUME /etc/bind

CMD ["named", "-c", "/etc/bind/named.conf", "-g"]
