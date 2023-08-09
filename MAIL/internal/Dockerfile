# launch from image
FROM ubuntu:latest

# update packages
RUN apt-get update -y && apt-get upgrade -y && \
DEBIAN_FRONTEND=noninteractive apt-get install -y postfix dovecot-core dovecot-imapd dovecot-pop3d dovecot-lmtpd dovecot-mysql mysql-client && \
apt-get clean && rm -rf /var/lib/apt/lists/*

# copy configuration files
COPY dovecot.conf /etc/dovecot/
COPY main.cf /etc/postfix/

# enable mail ports
EXPOSE 25 110 143 587 993 995

# create users
RUN adduser gabrielle && echo "gabrielle:gabrielle" | chpasswd
RUN adduser simon && echo "simon:simon" | chpasswd
RUN adduser thomas && echo "thomas:thomas" | chpasswd

CMD service postfix start && service dovecot start && tail -f /dev/null