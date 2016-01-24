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

# Important stuff
* CORS requests don't include Cookies by default. The `withCredentials` flag must be set to `true` in the XHR config [1].
* When issuing credentialed CORS requests the browser expects the server to respond with the `Access-Control-Allow-Credentials` header set to true [2].
* Furthermore, the `Access-Control-Allow-Origin` cannot be a wildcard (`*`) and must explicitly include the origin host [2].

[1] https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/withCredentials
[2] https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
