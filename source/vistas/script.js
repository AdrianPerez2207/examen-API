window.onload = async () => {
    const ciudad = document.getElementById("nombreCiudad");
    const boton = document.getElementById("buscar");
    const meteo = document.getElementById("metereologia");
    /**
     * Le añadimos un evento al botón de buscar. Cuando hacemos click, llamamos a la función getCiudades y le pasamos
     * el valor del input. Después, pintamos los resultados en la página y le añadimos un botón para añadir a la base de datos
     * la ciudad que se ha seleccionado.
     */
    boton.addEventListener("click", async () => {
        const result = await getCiudades(ciudad.value);
        console.log(result);
        let text_HTML = `<h2 class='text-center'>Ciudades</h2>
                <div class='table-responsive small'>
                    <table class='table table-striped table-sm w-50 mx-auto text-center'>
                        <thead>
                            <tr>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>País</th>
                                <th scope='col'>Latitud</th>
                                <th scope='col'>Longitud</th>
                                <th scope='col'>Añadir</th>
                            </tr>
                        </thead>
                        <tbody>
        `;
        for(const ciudad of result.results){
            let provincia = ciudad.components.province;
            let nombre = ciudad.components.city;
            let pais = ciudad.components.country;
            let latitud = ciudad.geometry.lat;
            let longitud = ciudad.geometry.lng;
            text_HTML += `
                    <tr>`;
                    if (provincia == null){
                        text_HTML += ` = <td class='w-25 align-middle fw-bold'>${nombre}</td>`;
                   } else {
                        text_HTML += `<td class='w-25 align-middle fw-bold'>${provincia}</td>`;
                    }
            text_HTML += `<td class='w-25 align-middle'>${pais}</td>
                        <td class='w-25 align-middle'>${latitud}</td>
                        <td class='w-25 align-middle'>${longitud}</td>
                        <td class='w-25 align-middle'>
                            <a href='index.php?accion=ciudadAPI&nombre=${nombre}&pais=${pais}&latitud=${latitud}&longitud=${longitud}'
                             type='button' class='btn btn-sm btn-success'>Añadir</a>
                        </td>
                    </tr>
            `;
        }
        text_HTML += `
                        </tbody>
                    </table>
                </div>
        `;
        document.getElementById("principal").innerHTML = text_HTML;
    });

    /**
     * Función para hacer la petición a la API.
     * @param nombreCiudad
     * @returns {Promise<any>}
     */
    async function getCiudades(nombreCiudad) {
        const key = "70b078a306c0484da00567003453247b";
        const url = `https://api.opencagedata.com/geocode/v1/json?q=${nombreCiudad}%2C+Spain&key=${key}`;

        try{
            const response = await fetch(url);
            const result = await response.json();
            console.log(result);
            return result;
        }catch(error){
            console.error(error);
            throw error;
        }
    }


    /**
     * Función para hacer la petición a la API para mostrar la meteorología.
     * Recuperamos todos los datos por id, se lo pasamos a la función getWeather y pintamos en los elementos de la página.
     * @returns {Promise<void>}
     */
    meteo.addEventListener("click", async () => {
        const lat = document.getElementById("latitud");
        const lon = document.getElementById("longitud");
        console.log(lat.value);
        console.log(lon.value);
        const result = await getWeather(lat.value, lon.value);
        console.log(result);
        let temp = document.getElementById("temperatura");
        let hum = document.getElementById("humedad");
        let precip = document.getElementById("precipitacion");

        let t1 = document.getElementById("tM1");
        let t2 = document.getElementById("tM2");
        let t3 = document.getElementById("tM3");
        let h1 = document.getElementById("tm1");
        let h2 = document.getElementById("tm2");
        let h3 = document.getElementById("tm3");


        temp.innerHTML = result.current.temperature_2m;
        hum.innerHTML = result.current.relative_humidity_2m;
        precip.innerHTML = result.current.precipitation;
        t1.innerHTML = result.daily.temperature_2m_max[0];
        t2.innerHTML = result.daily.temperature_2m_max[1];
        t3.innerHTML = result.daily.temperature_2m_max[2];
        h1.innerHTML = result.daily.temperature_2m_min[0];
        h2.innerHTML = result.daily.temperature_2m_min[1];
        h3.innerHTML = result.daily.temperature_2m_min[2];
    });
    async function getWeather(latitud, longitud) {
        const url = `https://api.open-meteo.com/v1/forecast?latitude=${latitud}&longitude=${longitud}&current=temperature_2m,relative_humidity_2m,precipitation&daily=temperature_2m_max,temperature_2m_min&timezone=Europe%2FBerlin&forecast_days=3`;

        try{
            const response = await fetch(url);
            const result = await response.json();
            console.log(result);
            return result;
        } catch(error){
            console.error(error);
            throw error;
        }
    }
}