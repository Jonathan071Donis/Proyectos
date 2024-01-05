using System;
using System.Collections.Generic;
using System.IO;
using System.Text;


namespace Analizador
{
    public class AnalizadorSintactico
    {





        //Por medio de este método se realiza una validación de un equilibrio de paréntesis los cuales se ingresan a una pila
        public static void ValidarParentesis(string expresion)
        {
            Stack<char> pila = new Stack<char>();

            foreach (char c in expresion)
            {
                if (EsParentesisDeApertura(c))
                {
                    pila.Push(c);
                }
                else if (EsParentesisDeCierre(c))
                {
                    if (pila.Count == 0 || !EsParentesisBalanceado(pila.Peek(), c))
                    {
                        throw new ArgumentException("Error de sintaxis: paréntesis desbalanceados");
                    }
                    pila.Pop();
                }
            }

            if (pila.Count != 0)
            {
                throw new ArgumentException("Error de sintaxis: paréntesis desbalanceados");
            }
        }







        //En este método se definen los posibles paréntesis, corchetes o llaves de apertura
        public static bool EsParentesisDeApertura(char c)
        {
            return c == '(' || c == '[' || c == '{';
        }









        //En este método se definen los posibles paréntesis, corchetes o llaves de cierre
        public static bool EsParentesisDeCierre(char c)
        {
            return c == ')' || c == ']' || c == '}';
        }






        //En este método se establece la lógica del significado de paréntesis balanceado
        public static bool EsParentesisBalanceado(char apertura, char cierre)
        {
            return (apertura == '(' && cierre == ')')
                || (apertura == '[' && cierre == ']')
                || (apertura == '{' && cierre == '}');
        }







        //En este método se valida si existe uno o más signos "=" para eliminar los símbolos de igual que están demás
        public static string CorregirIgualDuplicado(string expresion)
        {
            expresion = System.Text.RegularExpressions.Regex.Replace(expresion, "=+", "="); // Eliminar "=" duplicados y dejar solo uno

            if (!expresion.Contains("="))
            {
                expresion += "="; // Agregar "=" si no existe
            }

            return expresion;
        }







        //Función principal donde se realiza el manejo de archivos para los datos de salida, es decir las operaciones ya analizadas y realizadas, se guardan en una ubicación determinada
        public static void Main(string[] args)
        {
            string rutaArchivo = "C:\\Users\\HP\\Desktop\\proyecto final\\TXT PROYECTOS COMPILADORES\\Operaciones aritméticas.txt";

            //El bloque try se utiliza para encapsular el código que puede generar una excepción.
            try
            {
                string contenido = LeerArchivo(rutaArchivo);
                List<string> expresiones = ObtenerExpresiones(contenido);

                string nombreArchivo = "Respuestas de archivo operador.txt";
                string rutaArchivoSalida = "C:\\Users\\HP\\Desktop\\proyecto final\\TXT PROYECTOS COMPILADORES\\" + nombreArchivo;

                // Eliminar archivo de salida si existe
                if (File.Exists(rutaArchivoSalida))
                {
                    File.Delete(rutaArchivoSalida);
                }

                //El bucle foreach se utiliza en programación para recorrer una colección de elementos o para iterar sobre los elementos de un arreglo, en este caso los elementos ya fueron declarados con anterioridad
                foreach (string expresion in expresiones)
                {
                    string expresionTrim = expresion.Trim();

                    if (!string.IsNullOrEmpty(expresionTrim))
                    {
                        string expresionCorregida = CorregirIgualDuplicado(expresionTrim);

                        try
                        {
                            ValidarParentesis(expresionCorregida); // Validar paréntesis antes de realizar el cálculo
                            ValidarOperadores(expresionCorregida); // Validar operadores antes de realizar el cálculo
                            double resultado = CalcularOperacion(expresionCorregida + "=");
                            string resultadoFormateado = resultado.ToString(); // Formatear el resultado como una cadena con dos decimales
                            Console.WriteLine($"{expresionCorregida} = {resultadoFormateado}"); // Imprimir la expresión, el signo igual, el resultado formateado y un salto de línea

                            using (StreamWriter writer = new StreamWriter(rutaArchivoSalida, true))
                            {
                                writer.WriteLine($"{expresionCorregida} = {resultadoFormateado}");
                            }
                        }


                        //El bloque catch se utiliza para capturar y manejar las excepciones generadas en el bloque try.
                        catch (ArgumentException e)
                        {
                            Console.WriteLine(e.Message);
                        }
                    }
                }

            }

            //El bloque catch se utiliza para capturar y manejar las excepciones generadas en el bloque try.
            catch (IOException e)
            {
                Console.WriteLine("Error al leer el archivo: " + e.Message);
            }
            //Acá realizamos un system pause, con el cual vamos a cerrar la consola únicamente cuando presionemos cualquier tecla
            Console.WriteLine("Presiona cualquier tecla para salir...");
            Console.ReadLine();
        }







        //Gracias a la función StreamReader realizamos la lectura del archivo, así como los datos internos
        public static string LeerArchivo(string rutaArchivo)
        {
            using (StreamReader reader = new StreamReader(rutaArchivo))
            {
                return reader.ReadToEnd();
            }
        }









        //Se obtienen las expresiones dentro del archivo txt
        public static List<string> ObtenerExpresiones(string contenido)
        {
            List<string> expresiones = new List<string>();
            string[] lineas = contenido.Split('\n');

            foreach (string linea in lineas)
            {
                string expresion = linea.Trim();
                if (!string.IsNullOrEmpty(expresion))
                {
                    expresiones.Add(expresion);
                }
            }

            return expresiones;
        }








        //En este método implementamos toda la lógica del sistema, ya que valida desde el reemplazo, la carga a la pila operadores, y otra para números como Stack o pila en español
        public static double CalcularOperacion(string expresion)
        {
            Stack<double> numeros = new Stack<double>();
            Stack<char> operadores = new Stack<char>();

            string expresionLimpia = System.Text.RegularExpressions.Regex.Replace(expresion, "\\s+", "");

            StringBuilder numero = new StringBuilder();
            bool esNegativo = false;


            //Por medio e este bucle realizamos un árbol de if con el cual vamos a realizar múltiples verificaciones, desde verificar si la pila está llena o vacía, hasta que exista la misma cantidad de números y operadores para poder operar
            for (int i = 0; i < expresionLimpia.Length; i++)
            {
                char c = expresionLimpia[i];

                if (char.IsDigit(c) || c == '.')
                {
                    numero.Append(c);
                }
                else if (c == '-')
                {
                    if (i == 0 || EsOperadorAritmetico(expresionLimpia[i - 1]))
                    {
                        esNegativo = true;
                    }
                    else
                    {
                        while (operadores.Count > 0 && TieneMayorPrioridad(operadores.Peek(), c))
                        {
                            CalcularOperacion(numeros, operadores);
                        }
                        operadores.Push(c);
                    }
                }
                else if (EsOperadorAritmetico(c))
                {
                    while (operadores.Count > 0 && TieneMayorPrioridad(operadores.Peek(), c))
                    {
                        CalcularOperacion(numeros, operadores);
                    }
                    operadores.Push(c);
                }
                else if (c == '(' || c == '[' || c == '{')
                {
                    operadores.Push(c);
                }
                else if (c == ')' || c == ']' || c == '}')
                {
                    while (operadores.Count > 0 && operadores.Peek() != ObtenerParentesisOpuesto(c))
                    {
                        CalcularOperacion(numeros, operadores);
                    }

                    if (operadores.Count > 0 && operadores.Peek() == ObtenerParentesisOpuesto(c))
                    {
                        operadores.Pop();
                    }
                    else
                    {
                        throw new ArgumentException("Error de sintaxis: paréntesis desbalanceados");
                    }
                }

                if (!string.IsNullOrEmpty(numero.ToString()) && (i + 1 == expresionLimpia.Length || !char.IsDigit(expresionLimpia[i + 1])))
                {
                    double valorNumero = double.Parse(numero.ToString());
                    numeros.Push(esNegativo ? -valorNumero : valorNumero);
                    numero.Clear();
                    esNegativo = false;

                    if (i + 1 < expresionLimpia.Length && char.IsDigit(expresionLimpia[i + 1]) && !EsOperadorAritmetico(expresionLimpia[i]))
                    {
                        operadores.Push('*'); // Agregar multiplicación implícita
                    }

                    if (i + 1 == expresionLimpia.Length)
                    {
                        numeros.Push(valorNumero);
                        if (!expresionLimpia.EndsWith("="))
                        {
                            expresionLimpia += "=";
                        }
                    }
                }
            }

            while (operadores.Count > 0)
            {
                CalcularOperacion(numeros, operadores);
            }

            if (numeros.Count == 1)
            {
                return numeros.Pop();
            }
            else
            {
                throw new ArgumentException("Error de sintaxis");
            }
        }








        //Definimos los operadores "Aritméticos"
        public static bool EsOperadorAritmetico(char c)
        {
            return c == '+' || c == '-' || c == '*' || c == '/' || c == '^';
        }






        //Establecemos la jerarquía de operadores
        public static bool TieneMayorPrioridad(char operador1, char operador2)
        {
            return (operador1 == '*' || operador1 == '/') && (operador2 == '+' || operador2 == '-');
        }






        //Realizamos el procedimiento de la operación contenida en el archivo.
        public static void CalcularOperacion(Stack<double> numeros, Stack<char> operadores)
        {
            char operador = operadores.Pop();
            double resultado = 0;

            if (numeros.Count < 2)
            {
                throw new ArgumentException("Error de sintaxis: no hay suficientes números en la pila");
            }

            double numero2 = numeros.Pop();
            double numero1 = numeros.Pop();

            switch (operador)
            {
                case '*':
                    resultado = numero1 * numero2;
                    break;
                case '/':
                    resultado = numero1 / numero2;
                    break;
                case '+':
                    resultado = numero1 + numero2;
                    break;
                case '-':
                    resultado = numero1 - numero2;
                    break;
                case '^':
                    resultado = Math.Pow(numero1, numero2);
                    break;  
            }

            numeros.Push(resultado);
        }






        //Validamos operadores, es decir, una excepción para validar que no existan operadores duplicados juntos como ejemplo ++ o *- o /+ etc.
        public static void ValidarOperadores(string expresion)
        {
            string operadoresPermitidos = "+-*/^";

            for (int i = 0; i < expresion.Length - 1; i++)
            {
                char currentChar = expresion[i];
                char nextChar = expresion[i + 1];

                if (operadoresPermitidos.Contains(currentChar.ToString()) && operadoresPermitidos.Contains(nextChar.ToString()))
                {
                    throw new ArgumentException("Error de sintaxis: operadores duplicados o consecutivos");
                }
            }
        }






        //En este método al obtener paréntesis opuestos establecemos el espejo por medio de if else anidados
        public static char ObtenerParentesisOpuesto(char parentesis)
        {
            if (parentesis == ')')
                return '(';
            else if (parentesis == ']')
                return '[';
            else if (parentesis == '}')
                return '{';

            throw new ArgumentException("El carácter no es un paréntesis, corchete o llave");
        }
    }
}









