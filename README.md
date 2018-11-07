# Study Abacus Main website 

Main website of Study Abacus

## Setting up environment

- Install virtual environment

```sh
pip install virtualenv
```

- Create a virtual environment named env using the following command

```sh
virtualenv env -p python3
```

- To activate the virtual environment in Windows, run:

```sh
env\Scripts\activate.bat
```

- To activate the virtual environment in Linux or MacOS, run:

```sh
source env/bin/activate
```

- Run the following command to install the dependencies

```sh
pip install -r requirements.txt
```

## Running

```sh
python app.py
```

To stop the server, press `Ctrl + C` and deactivate the virtual environmenat using `deactivate` command.
