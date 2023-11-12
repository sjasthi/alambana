#!/bin/bash

# Check if the operating system is Windows
if [[ "$OSTYPE" == "msys" || "$OSTYPE" == "cygwin" ]]; then
    # Windows
    #"C:\xampp8\php\php.exe" "C:\xampp8\htdocs\aalambana_db\index.php"
    start "" "http://localhost/aalambana_db/index.php"
    read -p "Press Enter to exit..."
else
    # Mac or Linux
    #php "/xampp8/htdocs/aalambana_db/index.php"
    open "http://localhost/aalambana_db/index.php"
fi
