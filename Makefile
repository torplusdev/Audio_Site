folders:
	mkdir -p video/db	
	mkdir -p video/wp	
	mkdir -p video/backup	
	mkdir -p audio/wp	
	mkdir -p audio/db	
	mkdir -p audio/backup	

chmod:
	sudo chmod -R 777 ./audio/db
	sudo chmod -R 777 ./video/db
clean_all_wp_data:
	sudo rm -rf ./audio/db/
	sudo rm -rf ./audio/wp/
	sudo rm -rf ./video/db/
	sudo rm -rf ./video/wp/
restart:
	docker-compose down hp_torpus
	sudo chmod -R 777 ./tor
	sudo rm -rf ./tor/notice.log 
	touch ./tor/notice.log 
	docker-compose build hp_torpus
	docker-compose up -d hp_torpus 
pull:
	docker pull torplusserviceregistry.azurecr.io/private/ipfs_haproxy:latest 
pull_and_restart: pull restart
restart_all:
	docker-compose down 
	sudo chmod -R 777 ./tor
	docker-compose build
	docker-compose up -d
copy_backup:
	scp ./backups/backup_audio.zip ipfscp:/home/edikk202/wp-site/backups/
	scp ./backups/backup_video.zip ipfscp:~/wp-sites/backups/

build_ipfs:
	docker build -t ipfs -f $(PWD)/ipfs.dockerfile .
# unzip file.zip -d destination_folder



up:
	docker-compose up 
