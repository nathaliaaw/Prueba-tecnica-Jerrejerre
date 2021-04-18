<?php 
echo "<html>
		<body>
			<form action='subir.php' enctype='multipart/form-data' method='post'>
				<div align='center'>
					<div style ='background-color:#C4C0C0;border: 1px solid ;color:white;width:400px;padding: 12px;'>
						GEMA SAS
					</div>
					<div align='center'  style='border: 1px solid ;width:400px;padding: 12px;' >

							<div align='center'>
								<B>Formulario de carga de  informacion</B>
								<br>
								<br>
							    <input id='archivo' accept='.txt' name='archivo' type='file' style='color:black;border-style:solid;'/> 
							    <input name='MAX_FILE_SIZE' type='hidden' value='20000' /> 
							</div>
						   <br>
						   <div  align='right' >
						   		<input name='enviar' type='submit' value='Importar' />
						   </div>
						   <label>Error en el archivo, puede contener mas de 4 columnas</label>
						   
				    </div>
			    </div>

			</form>
		</body>
	</html>";
 ?>