using System;

namespace KardexConsola
{
    class Program
    {
        static void Main(string[] args)
        {
            Int16 codProducto;
            string nombreProducto;
            string descripcion;
            decimal precio;

            string fechaTransaccion;
            //string descripcionTransaccion;
            string tipoTransaccion;
            Int16 totalTransacciones;

            Int16 numeroMovimiento;
            string fechaDocumento;
            Int16 numeroDocumento;


            Transaccion transaccion = new Transaccion();

            Movimiento movimiento = new Movimiento();
            

            Console.WriteLine("ingrese el codigo producto");
            codProducto = Int16.Parse(Console.ReadLine());
            Console.WriteLine("nombre producto");
            nombreProducto = Console.ReadLine();
            Console.WriteLine("descripcion");
            descripcion = Console.ReadLine();
            Console.WriteLine("precio");
            precio = decimal.Parse(Console.ReadLine()); 
            Console.WriteLine("fecha transaccion");
            fechaTransaccion = Console.ReadLine();
            Console.WriteLine("tipo transaccion");
            tipoTransaccion = Console.ReadLine();
            Console.WriteLine("total transaccion");
            totalTransacciones = Int16.Parse(Console.ReadLine());
            Console.WriteLine("numero movimiento");
            numeroMovimiento = Int16.Parse(Console.ReadLine());
            Console.WriteLine("fecha documento");
            fechaDocumento = Console.ReadLine();
            Console.WriteLine("numeo documento ");
            numeroDocumento = Int16.Parse(Console.ReadLine());

            
            Kardex.Ingresar_Movimietos(numeroMovimiento, fechaDocumento, numeroDocumento,codProducto,nombreProducto,descripcion,precio);
            Kardex.Ingresar_Transacciones(fechaTransaccion, descripcion, tipoTransaccion,totalTransacciones);
            Kardex.MostrarKardex();
        }
    }
}
