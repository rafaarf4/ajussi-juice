<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-register">
                                <a href="#endpoints-POSTapi-register">POST api/register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-login">
                                <a href="#endpoints-POSTapi-login">POST api/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-users">
                                <a href="#endpoints-GETapi-users">GET api/users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-produk">
                                <a href="#endpoints-GETapi-produk">GET api/produk</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-produk--produk_id_produk-">
                                <a href="#endpoints-GETapi-produk--produk_id_produk-">GET api/produk/{produk_id_produk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-produk">
                                <a href="#endpoints-POSTapi-produk">POST api/produk</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-produk--produk_id_produk-">
                                <a href="#endpoints-PUTapi-produk--produk_id_produk-">PUT api/produk/{produk_id_produk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-produk--produk_id_produk-">
                                <a href="#endpoints-DELETEapi-produk--produk_id_produk-">DELETE api/produk/{produk_id_produk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-pesanan">
                                <a href="#endpoints-GETapi-pesanan">GET api/pesanan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-pesanan--id-">
                                <a href="#endpoints-GETapi-pesanan--id-">GET api/pesanan/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-pesanan--id-">
                                <a href="#endpoints-PUTapi-pesanan--id-">PUT api/pesanan/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-pesanan--id-">
                                <a href="#endpoints-DELETEapi-pesanan--id-">DELETE api/pesanan/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-pesanan">
                                <a href="#endpoints-POSTapi-pesanan">POST api/pesanan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-pesanan-user">
                                <a href="#endpoints-POSTapi-pesanan-user">POST api/pesanan-user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-pesanan-user--id_user-">
                                <a href="#endpoints-GETapi-pesanan-user--id_user-">GET api/pesanan-user/{id_user}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-pesanan--id--payment">
                                <a href="#endpoints-POSTapi-pesanan--id--payment">POST api/pesanan/{id}/payment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-ulasan">
                                <a href="#endpoints-POSTapi-ulasan">POST api/ulasan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-statistik">
                                <a href="#endpoints-GETapi-statistik">GET api/statistik</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-pesanan-pdf">
                                <a href="#endpoints-GETapi-pesanan-pdf">GET api/pesanan/pdf</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: December 12, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-register">POST api/register</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nama\": \"vmqeopfuudtdsufvyvddq\",
    \"email\": \"kunde.eloisa@example.com\",
    \"password\": \"4[*UyPJ\\\"}6\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nama": "vmqeopfuudtdsufvyvddq",
    "email": "kunde.eloisa@example.com",
    "password": "4[*UyPJ\"}6"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
</span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nama</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nama"                data-endpoint="POSTapi-register"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="kunde.eloisa@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>kunde.eloisa@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="4[*UyPJ"}6"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>4[*UyPJ"}6</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-login">POST api/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"password\": \"Z5ij-e\\/dl4m{o,\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com",
    "password": "Z5ij-e\/dl4m{o,"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="Z5ij-e/dl4m{o,"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>Z5ij-e/dl4m{o,</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-users">GET api/users</h2>

<p>
</p>



<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: http://localhost:5173
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;users&quot;: [
        {
            &quot;id&quot;: 6,
            &quot;nama&quot;: &quot;User Ajussi&quot;,
            &quot;email&quot;: &quot;user@gmail.com&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;nama&quot;: &quot;Rafa Ayu Radhyafitri&quot;,
            &quot;email&quot;: &quot;rafa@gmail.com&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;nama&quot;: &quot;Albani Daffa Restu Amba&quot;,
            &quot;email&quot;: &quot;dafa@gmail.com&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-produk">GET api/produk</h2>

<p>
</p>



<span id="example-requests-GETapi-produk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/produk" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/produk"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-produk">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: http://localhost:5173
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id_produk&quot;: 2,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Jus Mangga&quot;,
        &quot;kategori&quot;: &quot;Jus&quot;,
        &quot;harga&quot;: &quot;13000.00&quot;,
        &quot;deskripsi&quot;: &quot;Rasa manis dan segar dari buah mangga matang.&quot;,
        &quot;gambar&quot;: &quot;produk/isl353XSN4P1KEbcHHyGdr4UtMoq7IoRq33dXGBm.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2025-11-21 09:51:28&quot;
    },
    {
        &quot;id_produk&quot;: 3,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Keripik Pisang&quot;,
        &quot;kategori&quot;: &quot;Camilan&quot;,
        &quot;harga&quot;: &quot;10000.00&quot;,
        &quot;deskripsi&quot;: &quot;Keripik pisang gurih manis renyah setiap gigitan.&quot;,
        &quot;gambar&quot;: &quot;produk/Z2X85Vp1cwaoAmb0FGTpirtgYmzwvsuHPeuopAIK.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2025-11-12 07:27:18&quot;
    },
    {
        &quot;id_produk&quot;: 4,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
        &quot;kategori&quot;: &quot;Camilan&quot;,
        &quot;harga&quot;: &quot;12000.00&quot;,
        &quot;deskripsi&quot;: &quot;Kentang goreng renyah dengan saus pilihan.&quot;,
        &quot;gambar&quot;: &quot;produk/Tojebby0hdZjvYrhSluUUt3Ql9Ni57Md659GQXIE.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2025-11-21 09:52:16&quot;
    },
    {
        &quot;id_produk&quot;: 5,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Nasi Goreng Spesial&quot;,
        &quot;kategori&quot;: &quot;Makanan&quot;,
        &quot;harga&quot;: &quot;20000.00&quot;,
        &quot;deskripsi&quot;: &quot;Nasi goreng lengkap dengan telur dan ayam suwir.&quot;,
        &quot;gambar&quot;: &quot;produk/TgGGmuFUbZunZX6ve9EHGvvJZOfTgCITn2r6c0Xr.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2025-11-21 09:55:11&quot;
    },
    {
        &quot;id_produk&quot;: 6,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Mie Goreng Pedas&quot;,
        &quot;kategori&quot;: &quot;Makanan&quot;,
        &quot;harga&quot;: &quot;18000.00&quot;,
        &quot;deskripsi&quot;: &quot;Mie goreng pedas khas rumahan.&quot;,
        &quot;gambar&quot;: &quot;produk/j4HxZvmxCgcu33YOiaQjrmVjhXeoDvgPFujSuz5O.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2025-11-21 09:56:38&quot;
    },
    {
        &quot;id_produk&quot;: 7,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Es Teh Manis&quot;,
        &quot;kategori&quot;: &quot;Minuman&quot;,
        &quot;harga&quot;: &quot;5000.00&quot;,
        &quot;deskripsi&quot;: &quot;Es teh manis segar untuk pelepas dahaga.&quot;,
        &quot;gambar&quot;: &quot;produk/01geTwQ0GuFIXEZGS84pE7AuKyalzX9r5pyLNRxK.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2025-11-21 09:57:28&quot;
    },
    {
        &quot;id_produk&quot;: 8,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Kopi Susu Gula Aren&quot;,
        &quot;kategori&quot;: &quot;Minuman&quot;,
        &quot;harga&quot;: &quot;15000.00&quot;,
        &quot;deskripsi&quot;: &quot;Kopi susu kekinian dengan gula aren asli.&quot;,
        &quot;gambar&quot;: &quot;produk/DtcxoeW4lUZUXLnAJRwkpzPmjwPzArTJcYWtySah.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2025-11-21 09:58:05&quot;
    },
    {
        &quot;id_produk&quot;: 9,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Jus Stroberi&quot;,
        &quot;kategori&quot;: &quot;Jus&quot;,
        &quot;harga&quot;: &quot;14000.00&quot;,
        &quot;deskripsi&quot;: &quot;Jus stroberi segar dengan sedikit rasa asam manis.&quot;,
        &quot;gambar&quot;: &quot;produk/OWG0v9sISPTCOveTBAnf4UmveVka4VQbLH0kztEq.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2025-11-21 09:58:53&quot;
    },
    {
        &quot;id_produk&quot;: 10,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Roti Bakar Coklat Keju&quot;,
        &quot;kategori&quot;: &quot;Camilan&quot;,
        &quot;harga&quot;: &quot;16000.00&quot;,
        &quot;deskripsi&quot;: &quot;Roti bakar isi coklat dan keju leleh, cocok untuk teman ngopi.&quot;,
        &quot;gambar&quot;: &quot;produk/D02n4EKO25IBQMYLz3EmpEEFJVmCItArqQGDd5er.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2025-11-21 09:59:18&quot;
    },
    {
        &quot;id_produk&quot;: 11,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Jus Alpukat&quot;,
        &quot;kategori&quot;: &quot;Jus&quot;,
        &quot;harga&quot;: &quot;15000.00&quot;,
        &quot;deskripsi&quot;: null,
        &quot;gambar&quot;: &quot;produk/bWI80ibBCpqftM5GJxzaVUcsoKoZa58K0xhfYeY3.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: &quot;2025-11-12 07:27:28&quot;
    },
    {
        &quot;id_produk&quot;: 18,
        &quot;id_admin&quot;: 1,
        &quot;nama_produk&quot;: &quot;Es Jeruk Segar&quot;,
        &quot;kategori&quot;: &quot;Minuman&quot;,
        &quot;harga&quot;: &quot;6000.00&quot;,
        &quot;deskripsi&quot;: &quot;Segar Banget&quot;,
        &quot;gambar&quot;: &quot;produk/isl353XSN4P1KEbcHHyGdr4UtMoq7IoRq33dXGBm.jpg&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-produk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-produk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-produk"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-produk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-produk">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-produk" data-method="GET"
      data-path="api/produk"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-produk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-produk"
                    onclick="tryItOut('GETapi-produk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-produk"
                    onclick="cancelTryOut('GETapi-produk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-produk"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/produk</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-produk"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-produk"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-produk--produk_id_produk-">GET api/produk/{produk_id_produk}</h2>

<p>
</p>



<span id="example-requests-GETapi-produk--produk_id_produk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/produk/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/produk/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-produk--produk_id_produk-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: http://localhost:5173
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id_produk&quot;: 2,
    &quot;id_admin&quot;: 1,
    &quot;nama_produk&quot;: &quot;Jus Mangga&quot;,
    &quot;kategori&quot;: &quot;Jus&quot;,
    &quot;harga&quot;: &quot;13000.00&quot;,
    &quot;deskripsi&quot;: &quot;Rasa manis dan segar dari buah mangga matang.&quot;,
    &quot;gambar&quot;: &quot;produk/isl353XSN4P1KEbcHHyGdr4UtMoq7IoRq33dXGBm.jpg&quot;,
    &quot;created_at&quot;: null,
    &quot;updated_at&quot;: &quot;2025-11-21 09:51:28&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-produk--produk_id_produk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-produk--produk_id_produk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-produk--produk_id_produk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-produk--produk_id_produk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-produk--produk_id_produk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-produk--produk_id_produk-" data-method="GET"
      data-path="api/produk/{produk_id_produk}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-produk--produk_id_produk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-produk--produk_id_produk-"
                    onclick="tryItOut('GETapi-produk--produk_id_produk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-produk--produk_id_produk-"
                    onclick="cancelTryOut('GETapi-produk--produk_id_produk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-produk--produk_id_produk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/produk/{produk_id_produk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-produk--produk_id_produk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-produk--produk_id_produk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>produk_id_produk</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="produk_id_produk"                data-endpoint="GETapi-produk--produk_id_produk-"
               value="2"
               data-component="url">
    <br>
<p>Example: <code>2</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-produk">POST api/produk</h2>

<p>
</p>



<span id="example-requests-POSTapi-produk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/produk" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nama_produk\": \"vmqeopfuudtdsufvyvddq\",
    \"kategori\": \"amniihfqcoynlazghdtqt\",
    \"harga\": 56,
    \"deskripsi\": \"consequatur\",
    \"gambar\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/produk"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nama_produk": "vmqeopfuudtdsufvyvddq",
    "kategori": "amniihfqcoynlazghdtqt",
    "harga": 56,
    "deskripsi": "consequatur",
    "gambar": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-produk">
</span>
<span id="execution-results-POSTapi-produk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-produk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-produk"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-produk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-produk">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-produk" data-method="POST"
      data-path="api/produk"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-produk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-produk"
                    onclick="tryItOut('POSTapi-produk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-produk"
                    onclick="cancelTryOut('POSTapi-produk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-produk"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/produk</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-produk"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-produk"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nama_produk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nama_produk"                data-endpoint="POSTapi-produk"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kategori</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kategori"                data-endpoint="POSTapi-produk"
               value="amniihfqcoynlazghdtqt"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>amniihfqcoynlazghdtqt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>harga</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="harga"                data-endpoint="POSTapi-produk"
               value="56"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>56</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deskripsi"                data-endpoint="POSTapi-produk"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gambar</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gambar"                data-endpoint="POSTapi-produk"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-produk--produk_id_produk-">PUT api/produk/{produk_id_produk}</h2>

<p>
</p>



<span id="example-requests-PUTapi-produk--produk_id_produk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/produk/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nama_produk\": \"vmqeopfuudtdsufvyvddq\",
    \"kategori\": \"amniihfqcoynlazghdtqt\",
    \"harga\": 56,
    \"deskripsi\": \"consequatur\",
    \"gambar\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/produk/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nama_produk": "vmqeopfuudtdsufvyvddq",
    "kategori": "amniihfqcoynlazghdtqt",
    "harga": 56,
    "deskripsi": "consequatur",
    "gambar": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-produk--produk_id_produk-">
</span>
<span id="execution-results-PUTapi-produk--produk_id_produk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-produk--produk_id_produk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-produk--produk_id_produk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-produk--produk_id_produk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-produk--produk_id_produk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-produk--produk_id_produk-" data-method="PUT"
      data-path="api/produk/{produk_id_produk}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-produk--produk_id_produk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-produk--produk_id_produk-"
                    onclick="tryItOut('PUTapi-produk--produk_id_produk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-produk--produk_id_produk-"
                    onclick="cancelTryOut('PUTapi-produk--produk_id_produk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-produk--produk_id_produk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/produk/{produk_id_produk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-produk--produk_id_produk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-produk--produk_id_produk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>produk_id_produk</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="produk_id_produk"                data-endpoint="PUTapi-produk--produk_id_produk-"
               value="2"
               data-component="url">
    <br>
<p>Example: <code>2</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nama_produk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nama_produk"                data-endpoint="PUTapi-produk--produk_id_produk-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kategori</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kategori"                data-endpoint="PUTapi-produk--produk_id_produk-"
               value="amniihfqcoynlazghdtqt"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>amniihfqcoynlazghdtqt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>harga</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="harga"                data-endpoint="PUTapi-produk--produk_id_produk-"
               value="56"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>56</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deskripsi"                data-endpoint="PUTapi-produk--produk_id_produk-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gambar</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gambar"                data-endpoint="PUTapi-produk--produk_id_produk-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-produk--produk_id_produk-">DELETE api/produk/{produk_id_produk}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-produk--produk_id_produk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/produk/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/produk/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-produk--produk_id_produk-">
</span>
<span id="execution-results-DELETEapi-produk--produk_id_produk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-produk--produk_id_produk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-produk--produk_id_produk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-produk--produk_id_produk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-produk--produk_id_produk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-produk--produk_id_produk-" data-method="DELETE"
      data-path="api/produk/{produk_id_produk}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-produk--produk_id_produk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-produk--produk_id_produk-"
                    onclick="tryItOut('DELETEapi-produk--produk_id_produk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-produk--produk_id_produk-"
                    onclick="cancelTryOut('DELETEapi-produk--produk_id_produk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-produk--produk_id_produk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/produk/{produk_id_produk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-produk--produk_id_produk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-produk--produk_id_produk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>produk_id_produk</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="produk_id_produk"                data-endpoint="DELETEapi-produk--produk_id_produk-"
               value="2"
               data-component="url">
    <br>
<p>Example: <code>2</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-pesanan">GET api/pesanan</h2>

<p>
</p>



<span id="example-requests-GETapi-pesanan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pesanan" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pesanan"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pesanan">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: http://localhost:5173
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 34,
        &quot;id_user&quot;: 10,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-12-12&quot;,
        &quot;total_harga&quot;: &quot;53000.00&quot;,
        &quot;status&quot;: &quot;Menunggu&quot;,
        &quot;bukti_transfer&quot;: null,
        &quot;rating&quot;: null,
        &quot;ulasan&quot;: null,
        &quot;created_at&quot;: &quot;2025-12-12T07:36:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-12T07:36:05.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 10,
            &quot;nama&quot;: &quot;Albani Daffa Restu Amba&quot;
        },
        &quot;details&quot;: [
            {
                &quot;id&quot;: 93,
                &quot;id_pesanan&quot;: 34,
                &quot;id_produk&quot;: 4,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;12000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T07:36:05.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T07:36:05.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 4,
                    &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
                    &quot;harga&quot;: &quot;12000.00&quot;
                }
            },
            {
                &quot;id&quot;: 94,
                &quot;id_pesanan&quot;: 34,
                &quot;id_produk&quot;: 6,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;18000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T07:36:05.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T07:36:05.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 6,
                    &quot;nama_produk&quot;: &quot;Mie Goreng Pedas&quot;,
                    &quot;harga&quot;: &quot;18000.00&quot;
                }
            },
            {
                &quot;id&quot;: 95,
                &quot;id_pesanan&quot;: 34,
                &quot;id_produk&quot;: 3,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;10000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T07:36:05.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T07:36:05.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 3,
                    &quot;nama_produk&quot;: &quot;Keripik Pisang&quot;,
                    &quot;harga&quot;: &quot;10000.00&quot;
                }
            },
            {
                &quot;id&quot;: 96,
                &quot;id_pesanan&quot;: 34,
                &quot;id_produk&quot;: 2,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;13000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T07:36:05.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T07:36:05.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 2,
                    &quot;nama_produk&quot;: &quot;Jus Mangga&quot;,
                    &quot;harga&quot;: &quot;13000.00&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 33,
        &quot;id_user&quot;: 10,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-12-12&quot;,
        &quot;total_harga&quot;: &quot;90000.00&quot;,
        &quot;status&quot;: &quot;Diproses&quot;,
        &quot;bukti_transfer&quot;: &quot;1765524066_box.png&quot;,
        &quot;rating&quot;: null,
        &quot;ulasan&quot;: null,
        &quot;created_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-12T07:21:06.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 10,
            &quot;nama&quot;: &quot;Albani Daffa Restu Amba&quot;
        },
        &quot;details&quot;: [
            {
                &quot;id&quot;: 87,
                &quot;id_pesanan&quot;: 33,
                &quot;id_produk&quot;: 3,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;10000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 3,
                    &quot;nama_produk&quot;: &quot;Keripik Pisang&quot;,
                    &quot;harga&quot;: &quot;10000.00&quot;
                }
            },
            {
                &quot;id&quot;: 88,
                &quot;id_pesanan&quot;: 33,
                &quot;id_produk&quot;: 5,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;20000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 5,
                    &quot;nama_produk&quot;: &quot;Nasi Goreng Spesial&quot;,
                    &quot;harga&quot;: &quot;20000.00&quot;
                }
            },
            {
                &quot;id&quot;: 89,
                &quot;id_pesanan&quot;: 33,
                &quot;id_produk&quot;: 10,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;16000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 10,
                    &quot;nama_produk&quot;: &quot;Roti Bakar Coklat Keju&quot;,
                    &quot;harga&quot;: &quot;16000.00&quot;
                }
            },
            {
                &quot;id&quot;: 90,
                &quot;id_pesanan&quot;: 33,
                &quot;id_produk&quot;: 11,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;15000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 11,
                    &quot;nama_produk&quot;: &quot;Jus Alpukat&quot;,
                    &quot;harga&quot;: &quot;15000.00&quot;
                }
            },
            {
                &quot;id&quot;: 91,
                &quot;id_pesanan&quot;: 33,
                &quot;id_produk&quot;: 9,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;14000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 9,
                    &quot;nama_produk&quot;: &quot;Jus Stroberi&quot;,
                    &quot;harga&quot;: &quot;14000.00&quot;
                }
            },
            {
                &quot;id&quot;: 92,
                &quot;id_pesanan&quot;: 33,
                &quot;id_produk&quot;: 8,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;15000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T07:20:52.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 8,
                    &quot;nama_produk&quot;: &quot;Kopi Susu Gula Aren&quot;,
                    &quot;harga&quot;: &quot;15000.00&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 32,
        &quot;id_user&quot;: 9,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-12-12&quot;,
        &quot;total_harga&quot;: &quot;95000.00&quot;,
        &quot;status&quot;: &quot;Selesai&quot;,
        &quot;bukti_transfer&quot;: &quot;1765522528_#002040.png&quot;,
        &quot;rating&quot;: null,
        &quot;ulasan&quot;: null,
        &quot;created_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-12T06:55:45.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 9,
            &quot;nama&quot;: &quot;Rafa Ayu Radhyafitri&quot;
        },
        &quot;details&quot;: [
            {
                &quot;id&quot;: 81,
                &quot;id_pesanan&quot;: 32,
                &quot;id_produk&quot;: 4,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;12000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 4,
                    &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
                    &quot;harga&quot;: &quot;12000.00&quot;
                }
            },
            {
                &quot;id&quot;: 82,
                &quot;id_pesanan&quot;: 32,
                &quot;id_produk&quot;: 9,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;14000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 9,
                    &quot;nama_produk&quot;: &quot;Jus Stroberi&quot;,
                    &quot;harga&quot;: &quot;14000.00&quot;
                }
            },
            {
                &quot;id&quot;: 83,
                &quot;id_pesanan&quot;: 32,
                &quot;id_produk&quot;: 10,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;16000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 10,
                    &quot;nama_produk&quot;: &quot;Roti Bakar Coklat Keju&quot;,
                    &quot;harga&quot;: &quot;16000.00&quot;
                }
            },
            {
                &quot;id&quot;: 84,
                &quot;id_pesanan&quot;: 32,
                &quot;id_produk&quot;: 11,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;15000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 11,
                    &quot;nama_produk&quot;: &quot;Jus Alpukat&quot;,
                    &quot;harga&quot;: &quot;15000.00&quot;
                }
            },
            {
                &quot;id&quot;: 85,
                &quot;id_pesanan&quot;: 32,
                &quot;id_produk&quot;: 5,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;20000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 5,
                    &quot;nama_produk&quot;: &quot;Nasi Goreng Spesial&quot;,
                    &quot;harga&quot;: &quot;20000.00&quot;
                }
            },
            {
                &quot;id&quot;: 86,
                &quot;id_pesanan&quot;: 32,
                &quot;id_produk&quot;: 6,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;18000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:52:09.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 6,
                    &quot;nama_produk&quot;: &quot;Mie Goreng Pedas&quot;,
                    &quot;harga&quot;: &quot;18000.00&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 30,
        &quot;id_user&quot;: 9,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-12-12&quot;,
        &quot;total_harga&quot;: &quot;73000.00&quot;,
        &quot;status&quot;: &quot;Menunggu&quot;,
        &quot;bukti_transfer&quot;: null,
        &quot;rating&quot;: null,
        &quot;ulasan&quot;: null,
        &quot;created_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 9,
            &quot;nama&quot;: &quot;Rafa Ayu Radhyafitri&quot;
        },
        &quot;details&quot;: [
            {
                &quot;id&quot;: 70,
                &quot;id_pesanan&quot;: 30,
                &quot;id_produk&quot;: 4,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;12000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 4,
                    &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
                    &quot;harga&quot;: &quot;12000.00&quot;
                }
            },
            {
                &quot;id&quot;: 71,
                &quot;id_pesanan&quot;: 30,
                &quot;id_produk&quot;: 6,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;18000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 6,
                    &quot;nama_produk&quot;: &quot;Mie Goreng Pedas&quot;,
                    &quot;harga&quot;: &quot;18000.00&quot;
                }
            },
            {
                &quot;id&quot;: 72,
                &quot;id_pesanan&quot;: 30,
                &quot;id_produk&quot;: 2,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;13000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 2,
                    &quot;nama_produk&quot;: &quot;Jus Mangga&quot;,
                    &quot;harga&quot;: &quot;13000.00&quot;
                }
            },
            {
                &quot;id&quot;: 73,
                &quot;id_pesanan&quot;: 30,
                &quot;id_produk&quot;: 10,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;16000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 10,
                    &quot;nama_produk&quot;: &quot;Roti Bakar Coklat Keju&quot;,
                    &quot;harga&quot;: &quot;16000.00&quot;
                }
            },
            {
                &quot;id&quot;: 74,
                &quot;id_pesanan&quot;: 30,
                &quot;id_produk&quot;: 9,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;14000.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-12T06:31:42.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 9,
                    &quot;nama_produk&quot;: &quot;Jus Stroberi&quot;,
                    &quot;harga&quot;: &quot;14000.00&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 25,
        &quot;id_user&quot;: 4,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-11-21&quot;,
        &quot;total_harga&quot;: &quot;52000.00&quot;,
        &quot;status&quot;: &quot;Menunggu&quot;,
        &quot;bukti_transfer&quot;: null,
        &quot;rating&quot;: 5,
        &quot;ulasan&quot;: &quot;ok&quot;,
        &quot;created_at&quot;: &quot;2025-11-21T10:16:47.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-11-21T10:18:43.000000Z&quot;,
        &quot;user&quot;: null,
        &quot;details&quot;: [
            {
                &quot;id&quot;: 57,
                &quot;id_pesanan&quot;: 25,
                &quot;id_produk&quot;: 3,
                &quot;jumlah&quot;: 2,
                &quot;subtotal&quot;: &quot;20000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-21T10:16:47.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-21T10:16:47.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 3,
                    &quot;nama_produk&quot;: &quot;Keripik Pisang&quot;,
                    &quot;harga&quot;: &quot;10000.00&quot;
                }
            },
            {
                &quot;id&quot;: 58,
                &quot;id_pesanan&quot;: 25,
                &quot;id_produk&quot;: 5,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;20000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-21T10:16:47.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-21T10:16:47.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 5,
                    &quot;nama_produk&quot;: &quot;Nasi Goreng Spesial&quot;,
                    &quot;harga&quot;: &quot;20000.00&quot;
                }
            },
            {
                &quot;id&quot;: 59,
                &quot;id_pesanan&quot;: 25,
                &quot;id_produk&quot;: 4,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;12000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-21T10:16:47.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-21T10:16:47.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 4,
                    &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
                    &quot;harga&quot;: &quot;12000.00&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 24,
        &quot;id_user&quot;: 4,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-11-21&quot;,
        &quot;total_harga&quot;: &quot;73000.00&quot;,
        &quot;status&quot;: &quot;Diproses&quot;,
        &quot;bukti_transfer&quot;: null,
        &quot;rating&quot;: null,
        &quot;ulasan&quot;: null,
        &quot;created_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
        &quot;user&quot;: null,
        &quot;details&quot;: [
            {
                &quot;id&quot;: 52,
                &quot;id_pesanan&quot;: 24,
                &quot;id_produk&quot;: 8,
                &quot;jumlah&quot;: 2,
                &quot;subtotal&quot;: &quot;30000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 8,
                    &quot;nama_produk&quot;: &quot;Kopi Susu Gula Aren&quot;,
                    &quot;harga&quot;: &quot;15000.00&quot;
                }
            },
            {
                &quot;id&quot;: 53,
                &quot;id_pesanan&quot;: 24,
                &quot;id_produk&quot;: 7,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;5000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 7,
                    &quot;nama_produk&quot;: &quot;Es Teh Manis&quot;,
                    &quot;harga&quot;: &quot;5000.00&quot;
                }
            },
            {
                &quot;id&quot;: 54,
                &quot;id_pesanan&quot;: 24,
                &quot;id_produk&quot;: 10,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;16000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 10,
                    &quot;nama_produk&quot;: &quot;Roti Bakar Coklat Keju&quot;,
                    &quot;harga&quot;: &quot;16000.00&quot;
                }
            },
            {
                &quot;id&quot;: 55,
                &quot;id_pesanan&quot;: 24,
                &quot;id_produk&quot;: 3,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;10000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 3,
                    &quot;nama_produk&quot;: &quot;Keripik Pisang&quot;,
                    &quot;harga&quot;: &quot;10000.00&quot;
                }
            },
            {
                &quot;id&quot;: 56,
                &quot;id_pesanan&quot;: 24,
                &quot;id_produk&quot;: 4,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;12000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-21T09:59:54.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 4,
                    &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
                    &quot;harga&quot;: &quot;12000.00&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 23,
        &quot;id_user&quot;: 4,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-11-14&quot;,
        &quot;total_harga&quot;: &quot;67000.00&quot;,
        &quot;status&quot;: &quot;Diproses&quot;,
        &quot;bukti_transfer&quot;: null,
        &quot;rating&quot;: null,
        &quot;ulasan&quot;: null,
        &quot;created_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
        &quot;user&quot;: null,
        &quot;details&quot;: [
            {
                &quot;id&quot;: 47,
                &quot;id_pesanan&quot;: 23,
                &quot;id_produk&quot;: 3,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;10000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 3,
                    &quot;nama_produk&quot;: &quot;Keripik Pisang&quot;,
                    &quot;harga&quot;: &quot;10000.00&quot;
                }
            },
            {
                &quot;id&quot;: 48,
                &quot;id_pesanan&quot;: 23,
                &quot;id_produk&quot;: 4,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;12000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 4,
                    &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
                    &quot;harga&quot;: &quot;12000.00&quot;
                }
            },
            {
                &quot;id&quot;: 49,
                &quot;id_pesanan&quot;: 23,
                &quot;id_produk&quot;: 9,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;14000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 9,
                    &quot;nama_produk&quot;: &quot;Jus Stroberi&quot;,
                    &quot;harga&quot;: &quot;14000.00&quot;
                }
            },
            {
                &quot;id&quot;: 50,
                &quot;id_pesanan&quot;: 23,
                &quot;id_produk&quot;: 10,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;16000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 10,
                    &quot;nama_produk&quot;: &quot;Roti Bakar Coklat Keju&quot;,
                    &quot;harga&quot;: &quot;16000.00&quot;
                }
            },
            {
                &quot;id&quot;: 51,
                &quot;id_pesanan&quot;: 23,
                &quot;id_produk&quot;: 11,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;15000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:26:08.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 11,
                    &quot;nama_produk&quot;: &quot;Jus Alpukat&quot;,
                    &quot;harga&quot;: &quot;15000.00&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 22,
        &quot;id_user&quot;: 4,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-11-14&quot;,
        &quot;total_harga&quot;: &quot;101000.00&quot;,
        &quot;status&quot;: &quot;Menunggu&quot;,
        &quot;bukti_transfer&quot;: null,
        &quot;rating&quot;: null,
        &quot;ulasan&quot;: null,
        &quot;created_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
        &quot;user&quot;: null,
        &quot;details&quot;: [
            {
                &quot;id&quot;: 41,
                &quot;id_pesanan&quot;: 22,
                &quot;id_produk&quot;: 4,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;12000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 4,
                    &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
                    &quot;harga&quot;: &quot;12000.00&quot;
                }
            },
            {
                &quot;id&quot;: 42,
                &quot;id_pesanan&quot;: 22,
                &quot;id_produk&quot;: 5,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;20000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 5,
                    &quot;nama_produk&quot;: &quot;Nasi Goreng Spesial&quot;,
                    &quot;harga&quot;: &quot;20000.00&quot;
                }
            },
            {
                &quot;id&quot;: 43,
                &quot;id_pesanan&quot;: 22,
                &quot;id_produk&quot;: 2,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;13000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 2,
                    &quot;nama_produk&quot;: &quot;Jus Mangga&quot;,
                    &quot;harga&quot;: &quot;13000.00&quot;
                }
            },
            {
                &quot;id&quot;: 44,
                &quot;id_pesanan&quot;: 22,
                &quot;id_produk&quot;: 6,
                &quot;jumlah&quot;: 2,
                &quot;subtotal&quot;: &quot;36000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 6,
                    &quot;nama_produk&quot;: &quot;Mie Goreng Pedas&quot;,
                    &quot;harga&quot;: &quot;18000.00&quot;
                }
            },
            {
                &quot;id&quot;: 45,
                &quot;id_pesanan&quot;: 22,
                &quot;id_produk&quot;: 8,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;15000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:15:13.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 8,
                    &quot;nama_produk&quot;: &quot;Kopi Susu Gula Aren&quot;,
                    &quot;harga&quot;: &quot;15000.00&quot;
                }
            },
            {
                &quot;id&quot;: 46,
                &quot;id_pesanan&quot;: 22,
                &quot;id_produk&quot;: 7,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;5000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T09:15:14.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T09:15:14.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 7,
                    &quot;nama_produk&quot;: &quot;Es Teh Manis&quot;,
                    &quot;harga&quot;: &quot;5000.00&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 21,
        &quot;id_user&quot;: 4,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-11-14&quot;,
        &quot;total_harga&quot;: &quot;69000.00&quot;,
        &quot;status&quot;: &quot;Menunggu&quot;,
        &quot;bukti_transfer&quot;: null,
        &quot;rating&quot;: null,
        &quot;ulasan&quot;: null,
        &quot;created_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-11-14T09:04:36.000000Z&quot;,
        &quot;user&quot;: null,
        &quot;details&quot;: [
            {
                &quot;id&quot;: 36,
                &quot;id_pesanan&quot;: 21,
                &quot;id_produk&quot;: 11,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;15000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 11,
                    &quot;nama_produk&quot;: &quot;Jus Alpukat&quot;,
                    &quot;harga&quot;: &quot;15000.00&quot;
                }
            },
            {
                &quot;id&quot;: 37,
                &quot;id_pesanan&quot;: 21,
                &quot;id_produk&quot;: 8,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;15000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 8,
                    &quot;nama_produk&quot;: &quot;Kopi Susu Gula Aren&quot;,
                    &quot;harga&quot;: &quot;15000.00&quot;
                }
            },
            {
                &quot;id&quot;: 38,
                &quot;id_pesanan&quot;: 21,
                &quot;id_produk&quot;: 7,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;5000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 7,
                    &quot;nama_produk&quot;: &quot;Es Teh Manis&quot;,
                    &quot;harga&quot;: &quot;5000.00&quot;
                }
            },
            {
                &quot;id&quot;: 39,
                &quot;id_pesanan&quot;: 21,
                &quot;id_produk&quot;: 6,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;18000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 6,
                    &quot;nama_produk&quot;: &quot;Mie Goreng Pedas&quot;,
                    &quot;harga&quot;: &quot;18000.00&quot;
                }
            },
            {
                &quot;id&quot;: 40,
                &quot;id_pesanan&quot;: 21,
                &quot;id_produk&quot;: 10,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;16000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-14T07:41:02.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 10,
                    &quot;nama_produk&quot;: &quot;Roti Bakar Coklat Keju&quot;,
                    &quot;harga&quot;: &quot;16000.00&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 20,
        &quot;id_user&quot;: 4,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-11-13&quot;,
        &quot;total_harga&quot;: &quot;93000.00&quot;,
        &quot;status&quot;: &quot;Siap Diambil&quot;,
        &quot;bukti_transfer&quot;: null,
        &quot;rating&quot;: null,
        &quot;ulasan&quot;: null,
        &quot;created_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-11-13T09:18:10.000000Z&quot;,
        &quot;user&quot;: null,
        &quot;details&quot;: [
            {
                &quot;id&quot;: 30,
                &quot;id_pesanan&quot;: 20,
                &quot;id_produk&quot;: 5,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;20000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 5,
                    &quot;nama_produk&quot;: &quot;Nasi Goreng Spesial&quot;,
                    &quot;harga&quot;: &quot;20000.00&quot;
                }
            },
            {
                &quot;id&quot;: 31,
                &quot;id_pesanan&quot;: 20,
                &quot;id_produk&quot;: 2,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;13000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 2,
                    &quot;nama_produk&quot;: &quot;Jus Mangga&quot;,
                    &quot;harga&quot;: &quot;13000.00&quot;
                }
            },
            {
                &quot;id&quot;: 32,
                &quot;id_pesanan&quot;: 20,
                &quot;id_produk&quot;: 4,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;12000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 4,
                    &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
                    &quot;harga&quot;: &quot;12000.00&quot;
                }
            },
            {
                &quot;id&quot;: 33,
                &quot;id_pesanan&quot;: 20,
                &quot;id_produk&quot;: 9,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;14000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 9,
                    &quot;nama_produk&quot;: &quot;Jus Stroberi&quot;,
                    &quot;harga&quot;: &quot;14000.00&quot;
                }
            },
            {
                &quot;id&quot;: 34,
                &quot;id_pesanan&quot;: 20,
                &quot;id_produk&quot;: 6,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;18000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 6,
                    &quot;nama_produk&quot;: &quot;Mie Goreng Pedas&quot;,
                    &quot;harga&quot;: &quot;18000.00&quot;
                }
            },
            {
                &quot;id&quot;: 35,
                &quot;id_pesanan&quot;: 20,
                &quot;id_produk&quot;: 10,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;16000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-13T08:41:23.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 10,
                    &quot;nama_produk&quot;: &quot;Roti Bakar Coklat Keju&quot;,
                    &quot;harga&quot;: &quot;16000.00&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 19,
        &quot;id_user&quot;: 4,
        &quot;id_admin&quot;: null,
        &quot;tanggal_pesan&quot;: &quot;2025-11-12&quot;,
        &quot;total_harga&quot;: &quot;55000.00&quot;,
        &quot;status&quot;: &quot;Selesai&quot;,
        &quot;bukti_transfer&quot;: null,
        &quot;rating&quot;: 5,
        &quot;ulasan&quot;: &quot;ok&quot;,
        &quot;created_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-11-13T09:18:41.000000Z&quot;,
        &quot;user&quot;: null,
        &quot;details&quot;: [
            {
                &quot;id&quot;: 26,
                &quot;id_pesanan&quot;: 19,
                &quot;id_produk&quot;: 3,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;10000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 3,
                    &quot;nama_produk&quot;: &quot;Keripik Pisang&quot;,
                    &quot;harga&quot;: &quot;10000.00&quot;
                }
            },
            {
                &quot;id&quot;: 27,
                &quot;id_pesanan&quot;: 19,
                &quot;id_produk&quot;: 4,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;12000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 4,
                    &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
                    &quot;harga&quot;: &quot;12000.00&quot;
                }
            },
            {
                &quot;id&quot;: 28,
                &quot;id_pesanan&quot;: 19,
                &quot;id_produk&quot;: 2,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;13000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 2,
                    &quot;nama_produk&quot;: &quot;Jus Mangga&quot;,
                    &quot;harga&quot;: &quot;13000.00&quot;
                }
            },
            {
                &quot;id&quot;: 29,
                &quot;id_pesanan&quot;: 19,
                &quot;id_produk&quot;: 5,
                &quot;jumlah&quot;: 1,
                &quot;subtotal&quot;: &quot;20000.00&quot;,
                &quot;created_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
                &quot;produk&quot;: {
                    &quot;id_produk&quot;: 5,
                    &quot;nama_produk&quot;: &quot;Nasi Goreng Spesial&quot;,
                    &quot;harga&quot;: &quot;20000.00&quot;
                }
            }
        ]
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pesanan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pesanan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pesanan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pesanan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pesanan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pesanan" data-method="GET"
      data-path="api/pesanan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pesanan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pesanan"
                    onclick="tryItOut('GETapi-pesanan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pesanan"
                    onclick="cancelTryOut('GETapi-pesanan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pesanan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pesanan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pesanan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pesanan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-pesanan--id-">GET api/pesanan/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-pesanan--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pesanan/19" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pesanan/19"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pesanan--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: http://localhost:5173
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 19,
    &quot;id_user&quot;: 4,
    &quot;id_admin&quot;: null,
    &quot;tanggal_pesan&quot;: &quot;2025-11-12&quot;,
    &quot;total_harga&quot;: &quot;55000.00&quot;,
    &quot;status&quot;: &quot;Selesai&quot;,
    &quot;bukti_transfer&quot;: null,
    &quot;rating&quot;: 5,
    &quot;ulasan&quot;: &quot;ok&quot;,
    &quot;created_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-11-13T09:18:41.000000Z&quot;,
    &quot;user&quot;: null,
    &quot;details&quot;: [
        {
            &quot;id&quot;: 26,
            &quot;id_pesanan&quot;: 19,
            &quot;id_produk&quot;: 3,
            &quot;jumlah&quot;: 1,
            &quot;subtotal&quot;: &quot;10000.00&quot;,
            &quot;created_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
            &quot;produk&quot;: {
                &quot;id_produk&quot;: 3,
                &quot;nama_produk&quot;: &quot;Keripik Pisang&quot;,
                &quot;harga&quot;: &quot;10000.00&quot;
            }
        },
        {
            &quot;id&quot;: 27,
            &quot;id_pesanan&quot;: 19,
            &quot;id_produk&quot;: 4,
            &quot;jumlah&quot;: 1,
            &quot;subtotal&quot;: &quot;12000.00&quot;,
            &quot;created_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
            &quot;produk&quot;: {
                &quot;id_produk&quot;: 4,
                &quot;nama_produk&quot;: &quot;Kentang Goreng&quot;,
                &quot;harga&quot;: &quot;12000.00&quot;
            }
        },
        {
            &quot;id&quot;: 28,
            &quot;id_pesanan&quot;: 19,
            &quot;id_produk&quot;: 2,
            &quot;jumlah&quot;: 1,
            &quot;subtotal&quot;: &quot;13000.00&quot;,
            &quot;created_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
            &quot;produk&quot;: {
                &quot;id_produk&quot;: 2,
                &quot;nama_produk&quot;: &quot;Jus Mangga&quot;,
                &quot;harga&quot;: &quot;13000.00&quot;
            }
        },
        {
            &quot;id&quot;: 29,
            &quot;id_pesanan&quot;: 19,
            &quot;id_produk&quot;: 5,
            &quot;jumlah&quot;: 1,
            &quot;subtotal&quot;: &quot;20000.00&quot;,
            &quot;created_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-11-12T07:30:50.000000Z&quot;,
            &quot;produk&quot;: {
                &quot;id_produk&quot;: 5,
                &quot;nama_produk&quot;: &quot;Nasi Goreng Spesial&quot;,
                &quot;harga&quot;: &quot;20000.00&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pesanan--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pesanan--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pesanan--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pesanan--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pesanan--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pesanan--id-" data-method="GET"
      data-path="api/pesanan/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pesanan--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pesanan--id-"
                    onclick="tryItOut('GETapi-pesanan--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pesanan--id-"
                    onclick="cancelTryOut('GETapi-pesanan--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pesanan--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pesanan/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pesanan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pesanan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-pesanan--id-"
               value="19"
               data-component="url">
    <br>
<p>The ID of the pesanan. Example: <code>19</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-pesanan--id-">PUT api/pesanan/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-pesanan--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/pesanan/19" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"consequatur\",
    \"total_harga\": 11613.31890586
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pesanan/19"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "consequatur",
    "total_harga": 11613.31890586
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-pesanan--id-">
</span>
<span id="execution-results-PUTapi-pesanan--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-pesanan--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-pesanan--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-pesanan--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-pesanan--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-pesanan--id-" data-method="PUT"
      data-path="api/pesanan/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-pesanan--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-pesanan--id-"
                    onclick="tryItOut('PUTapi-pesanan--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-pesanan--id-"
                    onclick="cancelTryOut('PUTapi-pesanan--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-pesanan--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/pesanan/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-pesanan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-pesanan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-pesanan--id-"
               value="19"
               data-component="url">
    <br>
<p>The ID of the pesanan. Example: <code>19</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-pesanan--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>total_harga</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="total_harga"                data-endpoint="PUTapi-pesanan--id-"
               value="11613.31890586"
               data-component="body">
    <br>
<p>Example: <code>11613.31890586</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-pesanan--id-">DELETE api/pesanan/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-pesanan--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/pesanan/19" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pesanan/19"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-pesanan--id-">
</span>
<span id="execution-results-DELETEapi-pesanan--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-pesanan--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-pesanan--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-pesanan--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-pesanan--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-pesanan--id-" data-method="DELETE"
      data-path="api/pesanan/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-pesanan--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-pesanan--id-"
                    onclick="tryItOut('DELETEapi-pesanan--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-pesanan--id-"
                    onclick="cancelTryOut('DELETEapi-pesanan--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-pesanan--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/pesanan/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-pesanan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-pesanan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-pesanan--id-"
               value="19"
               data-component="url">
    <br>
<p>The ID of the pesanan. Example: <code>19</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-pesanan">POST api/pesanan</h2>

<p>
</p>



<span id="example-requests-POSTapi-pesanan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pesanan" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pesanan"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pesanan">
</span>
<span id="execution-results-POSTapi-pesanan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pesanan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pesanan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pesanan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pesanan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pesanan" data-method="POST"
      data-path="api/pesanan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pesanan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pesanan"
                    onclick="tryItOut('POSTapi-pesanan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pesanan"
                    onclick="cancelTryOut('POSTapi-pesanan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pesanan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pesanan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pesanan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pesanan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-pesanan-user">POST api/pesanan-user</h2>

<p>
</p>



<span id="example-requests-POSTapi-pesanan-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pesanan-user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pesanan-user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pesanan-user">
</span>
<span id="execution-results-POSTapi-pesanan-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pesanan-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pesanan-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pesanan-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pesanan-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pesanan-user" data-method="POST"
      data-path="api/pesanan-user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pesanan-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pesanan-user"
                    onclick="tryItOut('POSTapi-pesanan-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pesanan-user"
                    onclick="cancelTryOut('POSTapi-pesanan-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pesanan-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pesanan-user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pesanan-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pesanan-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-pesanan-user--id_user-">GET api/pesanan-user/{id_user}</h2>

<p>
</p>



<span id="example-requests-GETapi-pesanan-user--id_user-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pesanan-user/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pesanan-user/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pesanan-user--id_user-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: http://localhost:5173
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pesanan-user--id_user-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pesanan-user--id_user-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pesanan-user--id_user-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pesanan-user--id_user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pesanan-user--id_user-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pesanan-user--id_user-" data-method="GET"
      data-path="api/pesanan-user/{id_user}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pesanan-user--id_user-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pesanan-user--id_user-"
                    onclick="tryItOut('GETapi-pesanan-user--id_user-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pesanan-user--id_user-"
                    onclick="cancelTryOut('GETapi-pesanan-user--id_user-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pesanan-user--id_user-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pesanan-user/{id_user}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pesanan-user--id_user-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pesanan-user--id_user-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_user</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_user"                data-endpoint="GETapi-pesanan-user--id_user-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-pesanan--id--payment">POST api/pesanan/{id}/payment</h2>

<p>
</p>



<span id="example-requests-POSTapi-pesanan--id--payment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pesanan/19/payment" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "bukti_transfer=@C:\Users\Iwan Onone\AppData\Local\Temp\php71BE.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pesanan/19/payment"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('bukti_transfer', document.querySelector('input[name="bukti_transfer"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pesanan--id--payment">
</span>
<span id="execution-results-POSTapi-pesanan--id--payment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pesanan--id--payment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pesanan--id--payment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pesanan--id--payment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pesanan--id--payment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pesanan--id--payment" data-method="POST"
      data-path="api/pesanan/{id}/payment"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pesanan--id--payment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pesanan--id--payment"
                    onclick="tryItOut('POSTapi-pesanan--id--payment');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pesanan--id--payment"
                    onclick="cancelTryOut('POSTapi-pesanan--id--payment');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pesanan--id--payment"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pesanan/{id}/payment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pesanan--id--payment"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pesanan--id--payment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-pesanan--id--payment"
               value="19"
               data-component="url">
    <br>
<p>The ID of the pesanan. Example: <code>19</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bukti_transfer</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="bukti_transfer"                data-endpoint="POSTapi-pesanan--id--payment"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\Iwan Onone\AppData\Local\Temp\php71BE.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-ulasan">POST api/ulasan</h2>

<p>
</p>



<span id="example-requests-POSTapi-ulasan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/ulasan" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"rating\": 5,
    \"ulasan\": \"mqeopfuudtdsufvyvddqa\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/ulasan"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rating": 5,
    "ulasan": "mqeopfuudtdsufvyvddqa"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-ulasan">
</span>
<span id="execution-results-POSTapi-ulasan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-ulasan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-ulasan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-ulasan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-ulasan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-ulasan" data-method="POST"
      data-path="api/ulasan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-ulasan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-ulasan"
                    onclick="tryItOut('POSTapi-ulasan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-ulasan"
                    onclick="cancelTryOut('POSTapi-ulasan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-ulasan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/ulasan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-ulasan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-ulasan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rating</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating"                data-endpoint="POSTapi-ulasan"
               value="5"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 5. Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ulasan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ulasan"                data-endpoint="POSTapi-ulasan"
               value="mqeopfuudtdsufvyvddqa"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>mqeopfuudtdsufvyvddqa</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-statistik">GET api/statistik</h2>

<p>
</p>



<span id="example-requests-GETapi-statistik">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/statistik" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/statistik"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-statistik">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: http://localhost:5173
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;totalProduk&quot;: 11,
    &quot;totalPesanan&quot;: 11,
    &quot;totalUser&quot;: 3
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-statistik" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-statistik"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-statistik"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-statistik" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-statistik">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-statistik" data-method="GET"
      data-path="api/statistik"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-statistik', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-statistik"
                    onclick="tryItOut('GETapi-statistik');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-statistik"
                    onclick="cancelTryOut('GETapi-statistik');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-statistik"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/statistik</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-statistik"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-statistik"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-pesanan-pdf">GET api/pesanan/pdf</h2>

<p>
</p>



<span id="example-requests-GETapi-pesanan-pdf">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pesanan/pdf" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pesanan/pdf"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pesanan-pdf">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: http://localhost:5173
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Pesanan] pdf&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pesanan-pdf" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pesanan-pdf"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pesanan-pdf"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pesanan-pdf" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pesanan-pdf">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pesanan-pdf" data-method="GET"
      data-path="api/pesanan/pdf"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pesanan-pdf', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pesanan-pdf"
                    onclick="tryItOut('GETapi-pesanan-pdf');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pesanan-pdf"
                    onclick="cancelTryOut('GETapi-pesanan-pdf');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pesanan-pdf"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pesanan/pdf</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pesanan-pdf"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pesanan-pdf"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
