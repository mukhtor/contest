from python:3.9-slim-buster
RUN apt-get update -y
RUN apt install -y apt-transport-https lsb-release ca-certificates wget &&
    wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg &&
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list &&
    apt update -y
RUN apt install -y php7.4 php7.4-cli php7.4-common php7.4-json php7.4-opcache php7.4-mysql php7.4-zip php7.4-fpm php7.4-mbstring
COPY requirements.txt ./
RUN pip install -r requirements.txt
COPY . /app
WORKDIR /app
ENTRYPOINT ["python", "main.py"]
