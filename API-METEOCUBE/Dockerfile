FROM python:3.11.7-alpine

RUN pip install --upgrade pip

RUN apk add curl

RUN adduser -D nonroot
RUN mkdir /home/app/ && chown -R nonroot:nonroot /home/app
RUN mkdir -p /var/log/flask-app && touch /var/log/flask-app/flask-app.err.log && touch /var/log/flask-app/flask-app.out.log
RUN chown -R nonroot:nonroot /var/log/flask-app
WORKDIR /home/app
USER nonroot

COPY --chown=nonroot:nonroot . .

ENV VIRTUAL_ENV=/home/app/venv

RUN python -m venv $VIRTUAL_ENV
ENV PATH="$VIRTUAL_ENV/bin:$PATH"
RUN export FLASK_APP=app.py
run pip install -r requirement.txt

EXPOSE 5000

CMD ["python", ".py"]
