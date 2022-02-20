# Clay test case back-end

This is a Web API application to support an interface for users to access office premises and view their access history.

## .NET Core version

The application is built in .NET Core 3.1


## Project files

1) Clay.Api.csproj
	Startup application that invokes endpoints.
	
	`dotnet run --project ./Clay.Api/Clay.Api.csproj`
	
2) Clay.Domain.csproj
	Models used by the application.
	
3) Clay.Dal.csproj
	Data access layer of the application.
	
4) Clay.Api.Test.csproj
	Unit test cases for the application written in xUnit 2.4 and Moq 4.16.1
	
	`dotnet test ./Clay.Api.Test/Clay.Api.Test.csproj`
	

## Swagger documentation

Browse swagger document and schema from here.

	`/swagger/v1/swagger.json`
	`/swagger/index.html`

In order to speed up the development of a feature, we can generate the swagger file first by finalyzing on our data models and discuss it with front end engineers and basically freeze the API contract. So that both the backend and front end engineers start developing their respective parts in parallel and deliver the feature faster without keeping front end devs wait for long. 

## Endpoints

### Health check

1) Application healthcheck
	
	URL: `/HealthCheck/HeartBeat`
	
	HTTP method: `GET`
	
	Response example: 
		`Service is up and running on 23-01-2022 12:22:13`
	
# Roles Component
	
1) Create roles

	URL: `/Role/CreateRole`
	
	HTTP method: `POST`
	
	Request example:
		```{
				"name":"guest"
		   }```
		
	Response example:
		```{
				"message": "Success",
				"validationStatus": 1,
				"uniqueRefId": "a2d18638-7091-46ce-a941-8694b5a5b27f",
				"data": {
					"name": "GUEST",
					"id": 2,
					"createdDate": "2022-02-20T10:04:23.2639143Z",
					"updatedDate": "0001-01-01T00:00:00"
				}
			}```
		
2) Get all roles

	URL: `/Role/GetAllRoles`
	
	HTTP method: `POST`
		
	Response example:
		```{
				"message": "Success",
				"validationStatus": 1,
				"uniqueRefId": "a2d18638-7091-46ce-a941-8694b5a5b27f",
				"data": [
					{
						"name": "ADMIN",
						"id": 1,
						"createdDate": "2022-02-20T10:00:11.6649516",
						"updatedDate": "0001-01-01T00:00:00"
					},
					{
						"name": "EMPLOYEE",
						"id": 2,
						"createdDate": "2022-02-20T10:04:23.2639143",
						"updatedDate": "0001-01-01T00:00:00"
					}
				]
			}```
			
# User component

1) Create user

	URL: `/User/CreateUser`
	
	HTTP method: `POST`
	
	Request example:
		```{
				"firstname":"bob",
				"lastname":"miller",
				"gender":"male",
				"contactno":"9930496393",
				"emailid":"bob@gmail.com",
				"roles":[
					{
						"name":"employee",
						"id":2
					}
				]
			}```
		
	Response example:
		```{
				"message": "Success",
				"validationStatus": 1,
				"uniqueRefId": "a2d18638-7091-46ce-a941-8694b5a5b27f",
				"data": {
					"firstName": "bob",
					"lastName": "miller",
					"gender": "male",
					"contactNo": "99304963931",
					"emailId": "bob1@gmail.com",
					"tag": {
						"tagValue": "75e762e7-66fc-4590-83a0-70411e04cd27",
						"isActive": true,
						"checkpointId": null,
						"id": 3,
						"createdDate": "2022-02-20T16:10:06.3846942Z",
						"updatedDate": "0001-01-01T00:00:00"
					},
				"roles": [
					{
						"name": "employee",
						"id": 2,
						"createdDate": "0001-01-01T00:00:00",
						"updatedDate": "0001-01-01T00:00:00"
					}
				],
				"historicalEvent": null,
				"actionAtCheckpoint": 0,
				"id": 3,
				"createdDate": "2022-02-20T16:10:05.8627258Z",
				"updatedDate": "0001-01-01T00:00:00"
				}
			}```
		
# Checkpoint or Door component

1) Create checkpoints

	URL: `/Checkpoint/CreateCheckpoint`
	
	HTTP method: `POST`
	
	Request example:
		```{
				"door": "tunnel",
				"roles":[
					{
						"name":"employee",
						"id":2
					},
					{
						"name":"admin",
						"id":1
					}
				]
			}```
		
	Response example:
		```{
				"message": "Success",
				"validationStatus": 1,
				"uniqueRefId": "a2d18638-7091-46ce-a941-8694b5a5b27f",
				"data": {
					"door": "tunnel",
					"isActive": true,
					"roles": [
						{
							"name": "employee",
							"id": 2,
							"createdDate": "0001-01-01T00:00:00",
							"updatedDate": "0001-01-01T00:00:00"
						},
						{
							"name": "admin",
							"id": 1,
							"createdDate": "0001-01-01T00:00:00",
							"updatedDate": "0001-01-01T00:00:00"
						}
					],
					"actionAtCheckpoint": 0,
					"id": 1,
					"createdDate": "2022-02-20T10:06:23.580791Z",
					"updatedDate": "0001-01-01T00:00:00"
				}
			}```
			
2) Access checkpoints

	URL: `/Checkpoint/ActionAtCheckpoint`
	
	HTTP method: `POST`

A) Entering a door:
	
	Request example:
		```{
				"id": 1,
				"door":"tunnel",
				"actionatcheckpoint":1
			}```
		
	Response example:
		```{
				"message": "You logged in today at 20-02-2022 10:10:58",
				"validationStatus": 1,
				"uniqueRefId": "a2d18638-7091-46ce-a941-8694b5a5b27f",
				"data": {
					"firstName": "bob",
					"lastName": "miller",
					"gender": "male",
					"contactNo": "9930496393",
					"emailId": "bob@gmail.com",
					"tag": null,
					"roles": null,
					"historicalEvent": {
						"loginTimeStamp": "2022-02-20T10:10:58.4137905",
						"logoutTimeStamp": "2022-02-20T10:11:29.8133537",
						"userId": 2,
						"filter": null,
						"id": 1,
						"createdDate": "2022-02-20T10:10:58.4137002",
						"updatedDate": "0001-01-01T00:00:00"
					},
					"actionAtCheckpoint": 1,
					"id": 2,
					"createdDate": "2022-02-20T10:07:33.4770333",
					"updatedDate": "0001-01-01T00:00:00"
				}
			}```
			
B) Leaving a door

	Request example:
		```{
				"id": 1,
				"door":"tunnel",
				"actionatcheckpoint":0
			}```
		
	Response example:
		```{
				"message": "Your timings today are: Login at 20-02-2022 10:10:58 and logout at 20-02-2022 16:04:01",
				"validationStatus": 1,
				"uniqueRefId": "a2d18638-7091-46ce-a941-8694b5a5b27f",
				"data": {
					"firstName": "bob",
					"lastName": "miller",
					"gender": "male",
					"contactNo": "9930496393",
					"emailId": "bob@gmail.com",
					"tag": null,
					"roles": null,
					"historicalEvent": {
						"loginTimeStamp": "2022-02-20T10:10:58.4137905",
						"logoutTimeStamp": "2022-02-20T16:04:01.144085Z",
						"userId": 2,
						"filter": null,
						"id": 1,
						"createdDate": "2022-02-20T10:10:58.4137002",
						"updatedDate": "0001-01-01T00:00:00"
					},
					"actionAtCheckpoint": 0,
					"id": 2,
					"createdDate": "2022-02-20T10:07:33.4770333",
					"updatedDate": "0001-01-01T00:00:00"
				}
			}```
			

		
# Historical event component

1) Get user historical events based on user id and date filters

	URL: `/HistoricalEvent/GetHistoricalEvents`
	
	HTTP method: `POST`
	
	Request example:
		```{
				"userid":2,
				"filter":{
					"starttime":"2022-02-18",
					"endtime":"2022-02-20"
				}
			}```
		
	Response example:
		```{
				"message": "Success",
				"validationStatus": 1,
				"uniqueRefId": "a2d18638-7091-46ce-a941-8694b5a5b27f",
				"data": [
					{
						"loginTimeStamp": "2022-02-20T10:10:58.4137905",
						"logoutTimeStamp": "2022-02-20T16:04:01.144085",
						"userId": 2,
						"filter": null,
						"id": 1,
						"createdDate": "2022-02-20T10:10:58.4137002",
						"updatedDate": "0001-01-01T00:00:00"
					}
				]
			}```
		
## Request headers

1) Auth-ref: Auth reference token that uniquely identifies each request for tracking and troubleshooting purposes 

	`auth-ref: c9927bac-bcdb-4a26-b726-17a6c6db6737`
	
	Value can be any alphanumeric string starting with the word.
	
2) Tag: Each user is identified by a tag assigned at the time of creation.

	`tag: 6f176f02-2ad6-47e1-b889-064e6a5f323a`
	
	A user is authenticated and authorized based on roles assigned to this tag. If the tag is not valid or there are no roles assigned to it, the API throws 403 forbidden access response.
		
		
## Request Logging

API requests can be uniquely identified with the field "uniqueRefId" which is equal to auth-ref request header, value can be any alphanumeric string sent by the client and the same will be returned in response. One major reason to have this ID is for better tracking of API requests as all the logs in one request will be tagged with same ID, so that debugging becomes easy and resolving errors becomes fast and manageable.


## Third-party libraries

1) NLog 4.7.13: 
	Used for logging application exceptions in a text file.
	Log files are available in the "Logs" folder of root directory.


## Go to production

From DevOps point of view, this assignment may not be ready to go to production. There would be quite a few things that has to be done before going to production apart from connecting it with real data source (instead of having hardcoded data)

1) CI/CD pipelines
2) How to search for API logs
3) What authorization technique should we use - JWT token, just plain signatures, etc
4) Integrate the API with some APM tools
5) Decide on service SLAs
6) Performance, Scalability, should we use any caching strategies
