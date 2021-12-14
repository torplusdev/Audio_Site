# Introduction 

## Install docker:

    curl -fsSL https://get.docker.com -o get-docker.sh
    sh get-docker.sh
    chmod +x /usr/bin/docker
    sudo groupadd docker
    sudo usermod -aG docker $USER && newgrp docker
    sudo apt install docker-compose

1) Set seed and nickname to .env file

2) For run web site run or run on daemon mode:

    docker-compose up 

    docker-compose up -d # daemon mode
