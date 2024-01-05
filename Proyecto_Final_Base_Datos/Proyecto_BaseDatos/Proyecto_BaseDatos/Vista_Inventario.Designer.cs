namespace proyecto2
{
    partial class Vista_Inventario
    {
        /// <summary>
        /// Variable del diseñador necesaria.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpiar los recursos que se estén usando.
        /// </summary>
        /// <param name="disposing">true si los recursos administrados se deben desechar; false en caso contrario.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código generado por el Diseñador de Windows Forms

        /// <summary>
        /// Método necesario para admitir el Diseñador. No se puede modificar
        /// el contenido de este método con el editor de código.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            this.DATAGRIDiNVENTARY = new System.Windows.Forms.DataGridView();
            this.label2 = new System.Windows.Forms.Label();
            this.panel1 = new System.Windows.Forms.Panel();
            this.PRECIO = new System.Windows.Forms.NumericUpDown();
            this.label7 = new System.Windows.Forms.Label();
            this.BTNAGGPRODUCT = new System.Windows.Forms.Button();
            this.IDCATEGORIAPRODUCT = new System.Windows.Forms.NumericUpDown();
            this.label4 = new System.Windows.Forms.Label();
            this.IDMARCAPRODUCT = new System.Windows.Forms.NumericUpDown();
            this.label5 = new System.Windows.Forms.Label();
            this.DESCRIPCIONPRODUCT = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.contextMenuStrip1 = new System.Windows.Forms.ContextMenuStrip(this.components);
            this.STOCK = new System.Windows.Forms.Button();
            this.dataGridViewProductosMuestra = new System.Windows.Forms.DataGridView();
            ((System.ComponentModel.ISupportInitialize)(this.DATAGRIDiNVENTARY)).BeginInit();
            this.panel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.PRECIO)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.IDCATEGORIAPRODUCT)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.IDMARCAPRODUCT)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridViewProductosMuestra)).BeginInit();
            this.SuspendLayout();
            // 
            // DATAGRIDiNVENTARY
            // 
            this.DATAGRIDiNVENTARY.BackgroundColor = System.Drawing.Color.MistyRose;
            this.DATAGRIDiNVENTARY.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.DATAGRIDiNVENTARY.Location = new System.Drawing.Point(319, 106);
            this.DATAGRIDiNVENTARY.Margin = new System.Windows.Forms.Padding(4);
            this.DATAGRIDiNVENTARY.Name = "DATAGRIDiNVENTARY";
            this.DATAGRIDiNVENTARY.RowHeadersWidth = 51;
            this.DATAGRIDiNVENTARY.Size = new System.Drawing.Size(995, 134);
            this.DATAGRIDiNVENTARY.TabIndex = 0;
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.BackColor = System.Drawing.Color.Orange;
            this.label2.Font = new System.Drawing.Font("Franklin Gothic Medium", 20.25F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.ForeColor = System.Drawing.Color.Black;
            this.label2.Location = new System.Drawing.Point(7, 9);
            this.label2.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(199, 46);
            this.label2.TabIndex = 2;
            this.label2.Text = "PRODUCTOS";
            this.label2.UseCompatibleTextRendering = true;
            this.label2.UseWaitCursor = true;
            // 
            // panel1
            // 
            this.panel1.BackColor = System.Drawing.Color.Orange;
            this.panel1.Controls.Add(this.PRECIO);
            this.panel1.Controls.Add(this.label7);
            this.panel1.Controls.Add(this.BTNAGGPRODUCT);
            this.panel1.Controls.Add(this.IDCATEGORIAPRODUCT);
            this.panel1.Controls.Add(this.label4);
            this.panel1.Controls.Add(this.IDMARCAPRODUCT);
            this.panel1.Controls.Add(this.label5);
            this.panel1.Controls.Add(this.DESCRIPCIONPRODUCT);
            this.panel1.Controls.Add(this.label3);
            this.panel1.Location = new System.Drawing.Point(7, 106);
            this.panel1.Margin = new System.Windows.Forms.Padding(4);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(304, 286);
            this.panel1.TabIndex = 3;
            // 
            // PRECIO
            // 
            this.PRECIO.Location = new System.Drawing.Point(23, 208);
            this.PRECIO.Margin = new System.Windows.Forms.Padding(4);
            this.PRECIO.Name = "PRECIO";
            this.PRECIO.Size = new System.Drawing.Size(277, 22);
            this.PRECIO.TabIndex = 11;
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.BackColor = System.Drawing.Color.DarkGray;
            this.label7.Font = new System.Drawing.Font("Franklin Gothic Medium", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label7.ForeColor = System.Drawing.Color.Black;
            this.label7.Location = new System.Drawing.Point(22, 179);
            this.label7.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(150, 25);
            this.label7.TabIndex = 10;
            this.label7.Text = "   PRECIO        ";
            this.label7.Click += new System.EventHandler(this.label7_Click);
            // 
            // BTNAGGPRODUCT
            // 
            this.BTNAGGPRODUCT.BackColor = System.Drawing.Color.LightSkyBlue;
            this.BTNAGGPRODUCT.Font = new System.Drawing.Font("Microsoft YaHei UI", 7.8F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.BTNAGGPRODUCT.ForeColor = System.Drawing.Color.Black;
            this.BTNAGGPRODUCT.Location = new System.Drawing.Point(6, 238);
            this.BTNAGGPRODUCT.Margin = new System.Windows.Forms.Padding(4);
            this.BTNAGGPRODUCT.Name = "BTNAGGPRODUCT";
            this.BTNAGGPRODUCT.Size = new System.Drawing.Size(305, 39);
            this.BTNAGGPRODUCT.TabIndex = 9;
            this.BTNAGGPRODUCT.Text = "Insertar_Producto";
            this.BTNAGGPRODUCT.UseVisualStyleBackColor = false;
            this.BTNAGGPRODUCT.Click += new System.EventHandler(this.BTNAGGPRODUCT_Click);
            // 
            // IDCATEGORIAPRODUCT
            // 
            this.IDCATEGORIAPRODUCT.Location = new System.Drawing.Point(23, 153);
            this.IDCATEGORIAPRODUCT.Margin = new System.Windows.Forms.Padding(4);
            this.IDCATEGORIAPRODUCT.Name = "IDCATEGORIAPRODUCT";
            this.IDCATEGORIAPRODUCT.Size = new System.Drawing.Size(277, 22);
            this.IDCATEGORIAPRODUCT.TabIndex = 8;
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.BackColor = System.Drawing.Color.DarkGray;
            this.label4.Font = new System.Drawing.Font("Franklin Gothic Medium", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.ForeColor = System.Drawing.Color.Black;
            this.label4.Location = new System.Drawing.Point(25, 124);
            this.label4.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(147, 25);
            this.label4.TabIndex = 7;
            this.label4.Text = "ID CATEGORIA";
            // 
            // IDMARCAPRODUCT
            // 
            this.IDMARCAPRODUCT.Location = new System.Drawing.Point(23, 98);
            this.IDMARCAPRODUCT.Margin = new System.Windows.Forms.Padding(4);
            this.IDMARCAPRODUCT.Name = "IDMARCAPRODUCT";
            this.IDMARCAPRODUCT.Size = new System.Drawing.Size(277, 22);
            this.IDMARCAPRODUCT.TabIndex = 4;
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.BackColor = System.Drawing.Color.Silver;
            this.label5.Font = new System.Drawing.Font("Franklin Gothic Medium", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label5.ForeColor = System.Drawing.Color.Black;
            this.label5.Location = new System.Drawing.Point(22, 69);
            this.label5.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(144, 25);
            this.label5.TabIndex = 6;
            this.label5.Text = "ID MARCA      ";
            this.label5.Click += new System.EventHandler(this.label5_Click);
            // 
            // DESCRIPCIONPRODUCT
            // 
            this.DESCRIPCIONPRODUCT.Location = new System.Drawing.Point(24, 43);
            this.DESCRIPCIONPRODUCT.Margin = new System.Windows.Forms.Padding(4);
            this.DESCRIPCIONPRODUCT.Name = "DESCRIPCIONPRODUCT";
            this.DESCRIPCIONPRODUCT.Size = new System.Drawing.Size(276, 22);
            this.DESCRIPCIONPRODUCT.TabIndex = 4;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.BackColor = System.Drawing.Color.DarkGray;
            this.label3.Font = new System.Drawing.Font("Arial", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label3.ForeColor = System.Drawing.Color.Black;
            this.label3.Location = new System.Drawing.Point(22, 14);
            this.label3.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(157, 24);
            this.label3.TabIndex = 4;
            this.label3.Text = " DESCRIPCION ";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.BackColor = System.Drawing.Color.SandyBrown;
            this.label6.Font = new System.Drawing.Font("Algerian", 19.8F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label6.ForeColor = System.Drawing.Color.Black;
            this.label6.Location = new System.Drawing.Point(536, 66);
            this.label6.Margin = new System.Windows.Forms.Padding(13, 12, 13, 12);
            this.label6.MaximumSize = new System.Drawing.Size(6667, 246);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(458, 36);
            this.label6.TabIndex = 4;
            this.label6.Text = "Vista_Tabla_Inventario\r\n";
            // 
            // contextMenuStrip1
            // 
            this.contextMenuStrip1.ImageScalingSize = new System.Drawing.Size(20, 20);
            this.contextMenuStrip1.Name = "contextMenuStrip1";
            this.contextMenuStrip1.Size = new System.Drawing.Size(61, 4);
            // 
            // STOCK
            // 
            this.STOCK.BackColor = System.Drawing.Color.NavajoWhite;
            this.STOCK.Font = new System.Drawing.Font("Jokerman", 13.8F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.STOCK.ForeColor = System.Drawing.Color.Black;
            this.STOCK.Location = new System.Drawing.Point(248, 9);
            this.STOCK.Margin = new System.Windows.Forms.Padding(4);
            this.STOCK.Name = "STOCK";
            this.STOCK.Size = new System.Drawing.Size(147, 46);
            this.STOCK.TabIndex = 12;
            this.STOCK.Text = "STOCK";
            this.STOCK.UseVisualStyleBackColor = false;
            this.STOCK.Click += new System.EventHandler(this.STOCK_Click);
            // 
            // dataGridViewProductosMuestra
            // 
            this.dataGridViewProductosMuestra.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridViewProductosMuestra.Location = new System.Drawing.Point(319, 248);
            this.dataGridViewProductosMuestra.Margin = new System.Windows.Forms.Padding(4);
            this.dataGridViewProductosMuestra.Name = "dataGridViewProductosMuestra";
            this.dataGridViewProductosMuestra.RowHeadersWidth = 51;
            this.dataGridViewProductosMuestra.Size = new System.Drawing.Size(995, 161);
            this.dataGridViewProductosMuestra.TabIndex = 13;
            // 
            // Vista_Inventario
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.Chocolate;
            this.ClientSize = new System.Drawing.Size(1444, 436);
            this.Controls.Add(this.dataGridViewProductosMuestra);
            this.Controls.Add(this.STOCK);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.DATAGRIDiNVENTARY);
            this.Controls.Add(this.panel1);
            this.Margin = new System.Windows.Forms.Padding(4);
            this.Name = "Vista_Inventario";
            this.Text = "Form1";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.DATAGRIDiNVENTARY)).EndInit();
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.PRECIO)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.IDCATEGORIAPRODUCT)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.IDMARCAPRODUCT)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridViewProductosMuestra)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.DataGridView DATAGRIDiNVENTARY;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.NumericUpDown IDCATEGORIAPRODUCT;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.NumericUpDown IDMARCAPRODUCT;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.TextBox DESCRIPCIONPRODUCT;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Button BTNAGGPRODUCT;
        public System.Windows.Forms.Label label6;
        private System.Windows.Forms.NumericUpDown PRECIO;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.ContextMenuStrip contextMenuStrip1;
        private System.Windows.Forms.Button STOCK;
        private System.Windows.Forms.DataGridView dataGridViewProductosMuestra;
    }
}

