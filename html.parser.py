
#@title Mapping Index PHP html.parser
# Team // Ahmed Farah, Israel Love, Pao Vang, Alexis Morales, and KengJee Thao
#pip install beautifulsoup4
from bs4 import BeautifulSoup

# Read the content of the HTML file
with open('home.html', 'r', encoding='utf-8') as file:
    html_content = file.read()

# Parse the HTML content
soup = BeautifulSoup(html_content, 'html.parser')

# Find all links in the document
links = soup.find_all('a')

# Extract and print the href attributes of the links
for link in links:
    href = link.get('href')
    print(f'{href}')