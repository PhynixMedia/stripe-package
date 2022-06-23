## API SetUp For Mobile
> Create user

```angular2html
localhost:8000/api/user/create

Payload:
{
"patient_fullname":"Adebayo Olayinka",
"patient_phone":"+23443234598765",
"patient_email":"test@yess.com"
}

Response:
{
"status": "success",
"message": "User successfully created",
"user_id": 13,
"data": {
"user_id": 13
}}
```
> localhost:8000/api/user/record/create
```angular2html

Request:
{
"user_id":"13",
"patient_forename":"Adebayo",
"patient_surname":"Olayinka",
"patient_ethnicity":"Black",
"patient_sex":"Male",
"patient_date_of_birth":"2021-02-09",
"patient_address":"43 Bannockburn Rd",
"patient_postcode":"FK7 0BU",
"passport_number":"AN2345623",
"patient_email":"test@1234.com",
"patient_phone":"+443456543454",
"country_last_departed":"Poland",
"country_of_transit":"United Kingdom",
"date_of_arrival_in_uk":"2012-03-09",
"date_of_test_on_last_departure":"2012-12-09",
"vessel":"Plane",
"vaccination_status":"1",
"flight_number":"WE345",
"test_type":"day2"
}

Response:
{
"status": "success",
"message": "record successfully created"
}
```
> localhost:8000/api/user/record/archive 
```angular2html

Request:
{
"unique_reference_number":"PK101000006"
}

Response:
{
"message": "Record successfully archived",
"status": "success"
}
```
> localhost:8000/api/user/record/fetch/{identifier}
```angular2html
Request:

Response:
{
"data": [
{
"id": 6,
"user_id": 13,
"client_id": 0,
"patient_identifier": "3670E16F-AC78B-CD5",
"result": "-1",
"is_in_feramy": 0,
"result_due_at": null,
"queue_result": 0,
"specimen_unique_number": "10CBD595-AB6E8-3DC",
"specimen_type": "Oropharyngeal/Nasopharyngeal Swab",
"reporting_lab_code": null,
"unique_reference_number": null,
"cov19care_reference_number": "PK101000006",
"date_request_created": "2021-12-30 13:42:44",
"appointment_date": "2021-12-30",
"appointment_time": "13:42:44",
"sample_taken_date": "2021-12-30 13:42:44",
"date_sample_processed": "2021-12-30 13:42:44",
"is_paid": 1,
"is_archived": 1,
"amount": null,
"payment_method": "paypal",
"ordercode": "CID658c141c",
"status": "1",
"test_type": "day2",
"variation": "0",
"delivery_id": 1,
"location_id": 1,
"auto_notice": 0,
"is_day2_only": 0,
"ce_ivd": "Pro-Lab",
"source_lab_code": "COVCA",
"viasure": "Yes",
"downloaded": null,
"created_at": "2021-12-30T13:42:44.000000Z",
"updated_at": "2021-12-30T13:57:56.000000Z",
"patient": {
"id": 6,
"request_id": 6,
"patient_forename": "Adebayo",
"patient_middlename": null,
"patient_surname": "Olayinka",
"patient_sex": "Male",
"patient_date_of_birth": "2021-02-09",
"patient_age_in_years": 0,
"patient_age_in_months": 12,
"patient_death_indicator": null,
"patient_hospital_number": null,
"patient_address": "43 Bannockburn Rd",
"patient_city": null,
"house_flat_number": null,
"patient_postcode": "FK7 0BU",
"patient_email": "test@1234.com",
"patient_phone": "+443456543454",
"patient_nhs_number": null,
"patient_occupation": null,
"patient_ethnicity": "Black",
"patient_alt_address": null,
"created_at": "2021-12-30T13:42:44.000000Z",
"updated_at": "2021-12-30T13:42:44.000000Z"
},
"hospital": {
"id": 6,
"request_id": 6,
"vaccination_status": "0",
"medical_specialty": "NILL",
"bacteraemia_source": null,
"asymptomatic_indicator": null,
"hospital_consultant_code": null,
"ward": null,
"requestor_gp": null,
"hospital_acquired_indicator": null,
"immuno_compromised_indicator": null,
"outbreak_indicator": null,
"outbreak_information": null,
"created_at": "2021-12-30T13:42:44.000000Z",
"updated_at": "2021-12-30T13:42:44.000000Z"
},
"travel": {
"id": 6,
"request_id": 6,
"passport_number": "AN2345623",
"country_last_departed": "Poland",
"country_of_transit": "United Kingdom",
"date_of_arrival_in_uk": "2012-03-09 00:00:00",
"date_of_test_on_last_departure": "2012-12-09 00:00:00",
"vessel": "Plane",
"passenger_locator_reference": null,
"travel_indicator": null,
"travel_information": null,
"flight_number": "WE345",
"departure_date": null,
"vaccination_type": null,
"created_at": "2021-12-30T13:42:44.000000Z",
"updated_at": "2021-12-30T13:42:44.000000Z"
},
"client": null,
"user": {
"id": 13,
"client_id": 29,
"name": " ",
"email": "test@yess.com__c263",
"phone": "+23443234598765",
"role": null,
"identifier": null,
"is_admin": null,
"email_verified_at": null,
"created_at": "2021-12-30T12:41:16.000000Z",
"updated_at": "2021-12-30T12:41:16.000000Z"
},
"location": {
"id": 1,
"client_id": 38,
"location": "Leicester Clinic",
"phone": "+447791597819",
"email": "guled_abdi5@hotmail.co.uk",
"manager": "Adminisrator",
"address": "5 Museum Square, Leicester, GB, LE1 6UF\n",
"status": 1,
"created_at": "2021-06-03T06:42:00.000000Z",
"updated_at": "2021-11-18T22:52:45.000000Z"
},
"delivery": null
}
],
"status": "success"
}
```
> localhost:8000/api/user/result/upload/{identifier}
```angular2html
Request:


Response:
```

You should add the path to your migration file to refresh just this table and run

php artisan migrate:refresh --path=/database/migrations/my_migration.php
if you need rollback:

php artisan migrate:rollback  --path=/database/migrations/my_migration.php

single
php artisan migrate --path=/database/migrations/2020_06_16_183501_create_app_personal_table.php
