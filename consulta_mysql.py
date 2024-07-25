import pymysql
import pandas as pd
import os

def obtener_datos():
    # Obtener las variables de entorno
    host = os.getenv('DB_HOST')
    user = os.getenv('DB_USER')
    password = os.getenv('DB_PASSWORD')
    db = os.getenv('DB_NAME')
    port = int(os.getenv('DB_PORT', 3306))  # 3306 es el puerto por defecto de MySQL

    # Conexión a la base de datos
    conexion = pymysql.connect(
        host=host,
        user=user,
        password=password,
        db=db,
        port=port
    )

    # Realizar una consulta
    consulta = "SELECT * FROM tu_tabla"
    df = pd.read_sql_query(consulta, conexion)

    # Cerrar la conexión
    conexion.close()
    
    return df

if __name__ == "__main__":
    datos = obtener_datos()
    print(datos.head())
