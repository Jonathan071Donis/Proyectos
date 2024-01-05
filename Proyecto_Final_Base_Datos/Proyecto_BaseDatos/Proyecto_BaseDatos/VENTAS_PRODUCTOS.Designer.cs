namespace proyecto2
{
    partial class VENTAS_PRODUCTOS
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.dataGridViewProductosMuestra = new System.Windows.Forms.DataGridView();
            this.panel1 = new System.Windows.Forms.Panel();
            this.TextBoxIdProducto = new System.Windows.Forms.TextBox();
            this.textBoxIdCliente = new System.Windows.Forms.TextBox();
            this.comboBoxCLiente = new System.Windows.Forms.ComboBox();
            this.label6 = new System.Windows.Forms.Label();
            this.textBoxdelPrecio = new System.Windows.Forms.TextBox();
            this.BTNAGGPRODUCT = new System.Windows.Forms.Button();
            this.CantidadCompra = new System.Windows.Forms.NumericUpDown();
            this.label5 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.comboBoxnameproducts = new System.Windows.Forms.ComboBox();
            this.label2 = new System.Windows.Forms.Label();
            this.NumeroSalesH = new System.Windows.Forms.TextBox();
            this.textBoxSeriesSalesH = new System.Windows.Forms.NumericUpDown();
            this.label1 = new System.Windows.Forms.Label();
            this.label7 = new System.Windows.Forms.Label();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridViewProductosMuestra)).BeginInit();
            this.panel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.CantidadCompra)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.textBoxSeriesSalesH)).BeginInit();
            this.SuspendLayout();
            // 
            // dataGridViewProductosMuestra
            // 
            this.dataGridViewProductosMuestra.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridViewProductosMuestra.Location = new System.Drawing.Point(495, 52);
            this.dataGridViewProductosMuestra.Margin = new System.Windows.Forms.Padding(4);
            this.dataGridViewProductosMuestra.Name = "dataGridViewProductosMuestra";
            this.dataGridViewProductosMuestra.RowHeadersWidth = 51;
            this.dataGridViewProductosMuestra.Size = new System.Drawing.Size(645, 175);
            this.dataGridViewProductosMuestra.TabIndex = 0;
            this.dataGridViewProductosMuestra.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dataGridViewProductosMuestra_CellContentClick);
            // 
            // panel1
            // 
            this.panel1.BackColor = System.Drawing.Color.DarkKhaki;
            this.panel1.Controls.Add(this.label7);
            this.panel1.Controls.Add(this.label1);
            this.panel1.Controls.Add(this.NumeroSalesH);
            this.panel1.Controls.Add(this.TextBoxIdProducto);
            this.panel1.Controls.Add(this.textBoxIdCliente);
            this.panel1.Controls.Add(this.comboBoxCLiente);
            this.panel1.Controls.Add(this.label6);
            this.panel1.Controls.Add(this.textBoxSeriesSalesH);
            this.panel1.Controls.Add(this.textBoxdelPrecio);
            this.panel1.Controls.Add(this.BTNAGGPRODUCT);
            this.panel1.Controls.Add(this.CantidadCompra);
            this.panel1.Controls.Add(this.label5);
            this.panel1.Controls.Add(this.label4);
            this.panel1.Controls.Add(this.label3);
            this.panel1.Controls.Add(this.comboBoxnameproducts);
            this.panel1.Location = new System.Drawing.Point(0, 1);
            this.panel1.Margin = new System.Windows.Forms.Padding(4);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(487, 423);
            this.panel1.TabIndex = 6;
            // 
            // TextBoxIdProducto
            // 
            this.TextBoxIdProducto.Location = new System.Drawing.Point(323, 71);
            this.TextBoxIdProducto.Margin = new System.Windows.Forms.Padding(4);
            this.TextBoxIdProducto.Name = "TextBoxIdProducto";
            this.TextBoxIdProducto.Size = new System.Drawing.Size(113, 22);
            this.TextBoxIdProducto.TabIndex = 15;
            // 
            // textBoxIdCliente
            // 
            this.textBoxIdCliente.Location = new System.Drawing.Point(323, 17);
            this.textBoxIdCliente.Margin = new System.Windows.Forms.Padding(4);
            this.textBoxIdCliente.Name = "textBoxIdCliente";
            this.textBoxIdCliente.Size = new System.Drawing.Size(113, 22);
            this.textBoxIdCliente.TabIndex = 14;
            // 
            // comboBoxCLiente
            // 
            this.comboBoxCLiente.FormattingEnabled = true;
            this.comboBoxCLiente.Location = new System.Drawing.Point(127, 12);
            this.comboBoxCLiente.Margin = new System.Windows.Forms.Padding(4);
            this.comboBoxCLiente.Name = "comboBoxCLiente";
            this.comboBoxCLiente.Size = new System.Drawing.Size(164, 24);
            this.comboBoxCLiente.TabIndex = 13;
            this.comboBoxCLiente.SelectedIndexChanged += new System.EventHandler(this.comboBoxCLiente_SelectedIndexChanged);
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.BackColor = System.Drawing.Color.Gold;
            this.label6.Font = new System.Drawing.Font("Franklin Gothic Medium", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label6.ForeColor = System.Drawing.Color.Black;
            this.label6.Location = new System.Drawing.Point(-1, 9);
            this.label6.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(120, 25);
            this.label6.TabIndex = 12;
            this.label6.Text = "  CLIENTE   ";
            // 
            // textBoxdelPrecio
            // 
            this.textBoxdelPrecio.Location = new System.Drawing.Point(130, 140);
            this.textBoxdelPrecio.Margin = new System.Windows.Forms.Padding(4);
            this.textBoxdelPrecio.Name = "textBoxdelPrecio";
            this.textBoxdelPrecio.Size = new System.Drawing.Size(161, 22);
            this.textBoxdelPrecio.TabIndex = 11;
            // 
            // BTNAGGPRODUCT
            // 
            this.BTNAGGPRODUCT.BackColor = System.Drawing.Color.Gold;
            this.BTNAGGPRODUCT.Font = new System.Drawing.Font("Microsoft YaHei", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.BTNAGGPRODUCT.ForeColor = System.Drawing.Color.Black;
            this.BTNAGGPRODUCT.Location = new System.Drawing.Point(4, 364);
            this.BTNAGGPRODUCT.Margin = new System.Windows.Forms.Padding(4);
            this.BTNAGGPRODUCT.Name = "BTNAGGPRODUCT";
            this.BTNAGGPRODUCT.Size = new System.Drawing.Size(479, 55);
            this.BTNAGGPRODUCT.TabIndex = 10;
            this.BTNAGGPRODUCT.Text = "COMPRAR";
            this.BTNAGGPRODUCT.UseVisualStyleBackColor = false;
            this.BTNAGGPRODUCT.Click += new System.EventHandler(this.BTNAGGPRODUCT_Click);
            // 
            // CantidadCompra
            // 
            this.CantidadCompra.Location = new System.Drawing.Point(139, 216);
            this.CantidadCompra.Margin = new System.Windows.Forms.Padding(4);
            this.CantidadCompra.Name = "CantidadCompra";
            this.CantidadCompra.Size = new System.Drawing.Size(176, 22);
            this.CantidadCompra.TabIndex = 9;
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.BackColor = System.Drawing.Color.Gold;
            this.label5.Font = new System.Drawing.Font("Arial", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label5.ForeColor = System.Drawing.Color.Black;
            this.label5.Location = new System.Drawing.Point(4, 216);
            this.label5.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(128, 24);
            this.label5.TabIndex = 8;
            this.label5.Text = " CANTIDAD  ";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.BackColor = System.Drawing.Color.Gold;
            this.label4.Font = new System.Drawing.Font("Arial", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.ForeColor = System.Drawing.Color.Black;
            this.label4.Location = new System.Drawing.Point(4, 140);
            this.label4.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(91, 24);
            this.label4.TabIndex = 7;
            this.label4.Text = " PRECIO";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.BackColor = System.Drawing.Color.Gold;
            this.label3.Font = new System.Drawing.Font("Arial", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label3.ForeColor = System.Drawing.Color.Black;
            this.label3.Location = new System.Drawing.Point(-1, 71);
            this.label3.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(130, 24);
            this.label3.TabIndex = 5;
            this.label3.Text = " PRODUCTO";
            // 
            // comboBoxnameproducts
            // 
            this.comboBoxnameproducts.FormattingEnabled = true;
            this.comboBoxnameproducts.Location = new System.Drawing.Point(139, 71);
            this.comboBoxnameproducts.Margin = new System.Windows.Forms.Padding(4);
            this.comboBoxnameproducts.Name = "comboBoxnameproducts";
            this.comboBoxnameproducts.Size = new System.Drawing.Size(161, 24);
            this.comboBoxnameproducts.TabIndex = 3;
            this.comboBoxnameproducts.SelectedIndexChanged += new System.EventHandler(this.comboBoxnameproducts_SelectedIndexChanged);
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.BackColor = System.Drawing.Color.Gold;
            this.label2.Font = new System.Drawing.Font("Algerian", 22.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.ForeColor = System.Drawing.Color.Black;
            this.label2.Location = new System.Drawing.Point(495, 1);
            this.label2.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(356, 41);
            this.label2.TabIndex = 5;
            this.label2.Text = "Vista_Productos";
            // 
            // NumeroSalesH
            // 
            this.NumeroSalesH.Location = new System.Drawing.Point(139, 317);
            this.NumeroSalesH.Margin = new System.Windows.Forms.Padding(4);
            this.NumeroSalesH.Name = "NumeroSalesH";
            this.NumeroSalesH.Size = new System.Drawing.Size(98, 22);
            this.NumeroSalesH.TabIndex = 16;
            this.NumeroSalesH.TextChanged += new System.EventHandler(this.NumeroSalesH_TextChanged);
            // 
            // textBoxSeriesSalesH
            // 
            this.textBoxSeriesSalesH.Location = new System.Drawing.Point(139, 264);
            this.textBoxSeriesSalesH.Margin = new System.Windows.Forms.Padding(4);
            this.textBoxSeriesSalesH.Name = "textBoxSeriesSalesH";
            this.textBoxSeriesSalesH.Size = new System.Drawing.Size(98, 22);
            this.textBoxSeriesSalesH.TabIndex = 17;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.BackColor = System.Drawing.Color.Gold;
            this.label1.Font = new System.Drawing.Font("Arial", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(13, 265);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(86, 24);
            this.label1.TabIndex = 18;
            this.label1.Text = "Sales_H";
            this.label1.Click += new System.EventHandler(this.label1_Click);
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.BackColor = System.Drawing.Color.Gold;
            this.label7.Font = new System.Drawing.Font("Arial", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label7.Location = new System.Drawing.Point(13, 317);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(86, 24);
            this.label7.TabIndex = 19;
            this.label7.Text = "Sales_D";
            // 
            // VENTAS_PRODUCTOS
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.PaleGoldenrod;
            this.ClientSize = new System.Drawing.Size(1152, 426);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.panel1);
            this.Controls.Add(this.dataGridViewProductosMuestra);
            this.Margin = new System.Windows.Forms.Padding(4);
            this.Name = "VENTAS_PRODUCTOS";
            this.Text = "Ventas";
            this.Load += new System.EventHandler(this.Ventas_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridViewProductosMuestra)).EndInit();
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.CantidadCompra)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.textBoxSeriesSalesH)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.DataGridView dataGridViewProductosMuestra;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.ComboBox comboBoxnameproducts;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.NumericUpDown CantidadCompra;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Button BTNAGGPRODUCT;
        private System.Windows.Forms.TextBox textBoxdelPrecio;
        private System.Windows.Forms.TextBox textBoxIdCliente;
        private System.Windows.Forms.ComboBox comboBoxCLiente;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.TextBox TextBoxIdProducto;
        private System.Windows.Forms.TextBox NumeroSalesH;
        private System.Windows.Forms.NumericUpDown textBoxSeriesSalesH;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Label label1;
    }
}