#!/bin/bash
set -eux

wget -nc https://getcomposer.org/composer.phar
php composer.phar self-update

php composer.phar install

cat >custom-php.ini <<EOL

EOL

echo -n "" > results.txt

for i in *.php; do
	/usr/bin/time -f "%e\t$i" php -c custom-php.ini $i > /dev/null 2>> results.txt
done

sort -rn -o results.txt results.txt
