# NASA-OPEN-APIs

## Official Docs
- Generate NASA API Key [Official Docs](https://api.nasa.gov/).
- Authentication [More Detail](https://api.nasa.gov/#authentication/).

## Usage

    $nasa = new Nasa();
    $nasa->setDate("2018-05-05");
    $nasa->getImage(); // Response Json Image List