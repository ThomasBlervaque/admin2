# Image de base
FROM ubuntu:latest

# Paquets nécessaires
RUN apt-get update -y && apt-get install -y
RUN apt install dovecot-imapd dovecot-pop3d -y
RUN apt install postfix -y
RUN apt install fail2ban -y
RUN apt-get install telnet

# Fichiers pour postfix
COPY postfix/main.cf /etc/postfix/
#COPY postfix/master.cf /etc/postfix/

# Fichiers pour dovecot
COPY dovecot/dovecot.conf /etc/dovecot/
COPY dovecot/10-mail.conf /etc/dovecot/conf.d/
COPY dovecot/10-master.conf /etc/dovecot/conf.d/
COPY dovecot/10-auth.conf /etc/dovecot/conf.d/

# fail2ban pour postfix et dovecot
COPY /fail2ban/jail.local /etc/fail2ban/
COPY /fail2ban/custom.conf /etc/fail2ban/jail.d/

# Utilisateurs et mots de passe
RUN adduser test
RUN mkhomedir_helper test
RUN echo "test:test" | chpasswd
RUN adduser test2
RUN mkhomedir_helper test2
RUN echo "test2:test2" | chpasswd

# Ports à exposer
EXPOSE 993/tcp
EXPOSE 995/tcp
EXPOSE 465/tcp
#EXPOSE 587/tcp
EXPOSE 25/tcp
EXPOSE 2525/tcp
EXPOSE 110/tcp
EXPOSE 143/tcp

# Lancement des services
CMD ["sh", "-c", "service postfix start && service dovecot start && service fail2ban start && tail -f /dev/null"]