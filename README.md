# Chatbot with pure HTMX 
### Inspired from https://github.com/unconv/ChatHTMX
### I used php server for backend
### I used flask server for AI responses. Transformer library default text-generation 'distil-gpt2' model is used

# Installation

`git clone https://github.com/harsh-lodha/chathtmx-php.git`

### php installation

https://www.php.net/downloads (download php)

### Add php to environment variable : 
Search -> Edit the System Environment Variable -> Environment Variable -> <br>
System Variable -> Path -> Edit -> <br>
New -> C:\your\path\to\php\installation (C:\Program Files\php-8.2.12-Win32-vs16-x64\)<br>

### enable extensions and curl library
In the php installation directory , open 'C:\Program Files\php-8.2.12-Win32-vs16-x64\php.ini-development'<br>
Remove semicolon in folowing lines :<br>
`;extension_dir = "ext"` -> `extension_dir = "ext"`<br>
`;extension=curl` -> `extension=curl`<br>

# Usage
Install the requirements <br>
`python -m requirements.txt`<br>
Start the Flask server (default port: 5000)<br>
`python api.py`<br>
Start the php server(in new terminal)<br>
`php -S localhost:12345`<br>

# UI
![Alt text](./image.png)