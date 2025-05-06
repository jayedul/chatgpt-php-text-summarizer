## Text summarizer
This repository is a simple text summarizer using ChatGPT API written in PHP and JavaScript + jQuery. 

### How to run
First of all obtain your ChatGPT API key. And then rename <code>/lamp/env.php.sample</code> to <code>/lamp/env.php</code> and put the API key in the array in this file.

As it is a docker setup, you need docker installed and running. Then open terminal in this project root and run <code>docker compose up -d</code>

It will run the server on http://localhost:8003/

You can change the port in the <code>docker-compose.yml</code> file beforehand.

If you don't want docker and run with other pre installed server, you can simply copy paste the <code>lamp</code> directory there and access the URL accordingly.