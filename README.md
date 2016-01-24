# xdomain-session
Proof-of-concept for delegated authentication and redirection

# Usage instructions
Run the `serve.sh` utility to start PHP servers for the client and the server

1. Go to `http://localhost:8000/login.php`.
2. Enter `foo` as the username and `bar` as the password, then submit the form.
3. The server validates the credentials, initializes the session and returns the `Set-Cookie` header.
4. The browser is redirected to the client (`http://localhost:9000`).
5. The client attempts to fetch a sample JSON from a protected resource in the server (`foo.php`).
6. The request succeeds and the session ID is displayed in the client.
