FROM postgres:16-alpine

ENV POSTGRES_DB=whalebone
ENV POSTGRES_USER=postgres
ENV POSTGRES_PASSWORD=postgres

COPY ./01_owners_ddl.sql /docker-entrypoint-initdb.d/
COPY ./02_devices_ddl.sql /docker-entrypoint-initdb.d/
