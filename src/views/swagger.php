<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="SwaggerUI" />
    <title>SwaggerUI</title>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.14.3/swagger-ui.css">
</head>
<body>
    <div id="swagger-ui">
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.14.3/swagger-ui-standalone-preset.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.14.3/swagger-ui-bundle.js"></script>
    <script>
        window.onload = () =>
            window.ui = SwaggerUIBundle({
                url: "api-docs/schema",
                dom_id: '#swagger-ui',
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],
                layout: "StandaloneLayout"
            });
    </script>
</body>
</html>