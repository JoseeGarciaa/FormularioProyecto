import pymysql
import pandas as pd

def obtener_datos():
    # Conexión a la base de datos
    conexion = pymysql.connect(
        host='localhost',
        user='tu_usuario',
        password='tu_contraseña',
        db='tu_base_de_datos'
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
