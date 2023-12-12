import express from "express";
import cors from "cors";

// SDK de Mercado Pago
import { MercadoPagoConfig, Preference } from 'mercadopago';
// Agrega credenciales
const client = new MercadoPagoConfig({ accessToken: 'TEST-115378845148111-121209-4a1c6bf1edf9752fb566bfe4b4ee4579-320329749' });


const app = express();
const port = 3000;

app.use(cors());
app.use(express.json());

app.get("/", (req, res) => {
	res.send("Server Corriendo")
})
app.get("/", function (req, res) {
	res.status(200).sendFile("products.html");
});

app.post("/create_preference", async(req, res) => {
	try{
		const body = {
			items: [
				{
					id: req.body.id,
					title: req.body.title,
					quantity: Number(req.body.quantity),
					unit_price: Number(req.body.price),
					currency_id: "ARS",
				},
			],
			back_urls: {
				success: "https://github.com/Juanigue",
				failure: "https://github.com/Juanigue",
				pending: "https://github.com/Juanigue",
			},
			auto_return: "approved",
		};
		const preference = new Preference(client);
		const result = await preference.create({body});

		res.json({id: result.id});
		console.log(result.id);
	} catch(error){
		console.error(error);
		res.status(500).json({error: "Error al crear la preferencia"});
	}
})

app.listen(port, () => {
	console.log(`Server corriendo en: ${port}`)
})