# Whalebone task API

## Installation
To run the project, just execute following command:
```bash
docker-compose up
```
(Wait for composer to install all dependencies)

## Run
The API is available at `http://localhost:8080`

## Usage
There are 3 endpoints available.

### Create a new owner `POST /owners/new`

Example request:
```json
{
	"first_name": "John",
	"last_name": "Doe"
}
```

Example response:
```json
{ "id": 1 }
```

### Create a new device `POST /devices/new`

Example request:
```json
{
	"owner_id": 1,
	"hostname": "doej@example",
	"device_type": "laptop",
	"operating_system": "lin"
}
```

Example response:
```json
{ "id": 1 }
```

### List all devices `GET /devices`

Example response:
```json
[
	{
		"id": 1,
		"hostname": "doej@example",
		"device_type": "laptop",
		"operating_system": "lin"
		"owner": {
			"id": 1,
			"first_name": "John",
			"last_name": "Doe"
		}
	}
]
```
