all:
	jekyll build
sync:
	 rsync --progress --delete -r ./* root@asterios.katsifodimos.com:/var/www/Dropbox/Projects/fytavasilas.gr/
preview:
	jekyll serve --watch --baseurl ''
install:
	sudo gem install rouge kramdown jekyll
