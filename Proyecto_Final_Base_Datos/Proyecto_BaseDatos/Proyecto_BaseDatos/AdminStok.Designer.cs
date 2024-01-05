
using System;

namespace proyecto2
{
    partial class AdminStok
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
            this.Stock = new System.Windows.Forms.Panel();
            this.TextBoxIdProductoADMIN = new System.Windows.Forms.TextBox();
            this.textBoxdelPrecioADMIN = new System.Windows.Forms.TextBox();
            this.AGREGAR = new System.Windows.Forms.Button();
            this.CantidadaggADMIN = new System.Windows.Forms.NumericUpDown();
            this.label5 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.comboBoxnameproductsADMIN = new System.Windows.Forms.ComboBox();
            this.label2 = new System.Windows.Forms.Label();
            this.Stock.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.CantidadaggADMIN)).BeginInit();
            this.SuspendLayout();
            // 
            // Stock
            // 
            this.Stock.BackColor = System.Drawing.Color.Gold;
            this.Stock.Controls.Add(this.TextBoxIdProductoADMIN);
            this.Stock.Controls.Add(this.textBoxdelPrecioADMIN);
            this.Stock.Controls.Add(this.AGREGAR);
            this.Stock.Controls.Add(this.CantidadaggADMIN);
            this.Stock.Controls.Add(this.label5);
            this.Stock.Controls.Add(this.label4);
            this.Stock.Controls.Add(this.label3);
            this.Stock.Controls.Add(this.comboBoxnameproductsADMIN);
            this.Stock.Controls.Add(this.label2);
            this.Stock.Location = new System.Drawing.Point(-3, 1);
            this.Stock.Margin = new System.Windows.Forms.Padding(4);
            this.Stock.Name = "Stock";
            this.Stock.Size = new System.Drawing.Size(786, 554);
            this.Stock.TabIndex = 7;
            this.Stock.Paint += new System.Windows.Forms.PaintEventHandler(this.Stock_Paint);
            // 
            // TextBoxIdProductoADMIN
            // 
            this.TextBoxIdProductoADMIN.Location = new System.Drawing.Point(322, 114);
            this.TextBoxIdProductoADMIN.Margin = new System.Windows.Forms.Padding(4);
            this.TextBoxIdProductoADMIN.Name = "TextBoxIdProductoADMIN";
            this.TextBoxIdProductoADMIN.Size = new System.Drawing.Size(139, 22);
            this.TextBoxIdProductoADMIN.TabIndex = 15;
            // 
            // textBoxdelPrecioADMIN
            // 
            this.textBoxdelPrecioADMIN.Location = new System.Drawing.Point(139, 213);
            this.textBoxdelPrecioADMIN.Margin = new System.Windows.Forms.Padding(4);
            this.textBoxdelPrecioADMIN.Name = "textBoxdelPrecioADMIN";
            this.textBoxdelPrecioADMIN.Size = new System.Drawing.Size(175, 22);
            this.textBoxdelPrecioADMIN.TabIndex = 11;
            // 
            // AGREGAR
            // 
            this.AGREGAR.BackColor = System.Drawing.Color.DarkOrange;
            this.AGREGAR.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.AGREGAR.ForeColor = System.Drawing.Color.Black;
            this.AGREGAR.Location = new System.Drawing.Point(205, 375);
            this.AGREGAR.Margin = new System.Windows.Forms.Padding(4);
            this.AGREGAR.Name = "AGREGAR";
            this.AGREGAR.Size = new System.Drawing.Size(297, 97);
            this.AGREGAR.TabIndex = 10;
            this.AGREGAR.Text = "Insertar_Producto";
            this.AGREGAR.UseVisualStyleBackColor = false;
            this.AGREGAR.Click += new System.EventHandler(this.AGREGAR_Click);
            // 
            // CantidadaggADMIN
            // 
            this.CantidadaggADMIN.Location = new System.Drawing.Point(139, 282);
            this.CantidadaggADMIN.Margin = new System.Windows.Forms.Padding(4);
            this.CantidadaggADMIN.Name = "CantidadaggADMIN";
            this.CantidadaggADMIN.Size = new System.Drawing.Size(176, 22);
            this.CantidadaggADMIN.TabIndex = 9;
            this.CantidadaggADMIN.ValueChanged += new System.EventHandler(this.CantidadaggADMIN_ValueChanged);
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.BackColor = System.Drawing.Color.LightSkyBlue;
            this.label5.Font = new System.Drawing.Font("Franklin Gothic Medium", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label5.ForeColor = System.Drawing.Color.Black;
            this.label5.Location = new System.Drawing.Point(4, 282);
            this.label5.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(127, 25);
            this.label5.TabIndex = 8;
            this.label5.Text = " CANTIDAD  ";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.BackColor = System.Drawing.Color.LightSkyBlue;
            this.label4.Font = new System.Drawing.Font("Franklin Gothic Medium", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.ForeColor = System.Drawing.Color.Black;
            this.label4.Location = new System.Drawing.Point(4, 213);
            this.label4.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(90, 25);
            this.label4.TabIndex = 7;
            this.label4.Text = " PRECIO";
            this.label4.Click += new System.EventHandler(this.label4_Click);
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.BackColor = System.Drawing.Color.LightSkyBlue;
            this.label3.Font = new System.Drawing.Font("Franklin Gothic Medium", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label3.ForeColor = System.Drawing.Color.Black;
            this.label3.Location = new System.Drawing.Point(0, 114);
            this.label3.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(123, 25);
            this.label3.TabIndex = 5;
            this.label3.Text = " PRODUCTO";
            // 
            // comboBoxnameproductsADMIN
            // 
            this.comboBoxnameproductsADMIN.FormattingEnabled = true;
            this.comboBoxnameproductsADMIN.Location = new System.Drawing.Point(131, 114);
            this.comboBoxnameproductsADMIN.Margin = new System.Windows.Forms.Padding(4);
            this.comboBoxnameproductsADMIN.Name = "comboBoxnameproductsADMIN";
            this.comboBoxnameproductsADMIN.Size = new System.Drawing.Size(183, 24);
            this.comboBoxnameproductsADMIN.TabIndex = 3;
            this.comboBoxnameproductsADMIN.SelectedIndexChanged += new System.EventHandler(this.comboBoxnameproductsADMIN_SelectedIndexChanged);
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Franklin Gothic Medium", 24F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.ForeColor = System.Drawing.Color.Red;
            this.label2.Location = new System.Drawing.Point(37, 7);
            this.label2.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(0, 47);
            this.label2.TabIndex = 2;
            // 
            // AdminStok
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.DarkGray;
            this.ClientSize = new System.Drawing.Size(773, 546);
            this.Controls.Add(this.Stock);
            this.Margin = new System.Windows.Forms.Padding(4);
            this.Name = "AdminStok";
            this.Text = "AdminStok";
            this.Load += new System.EventHandler(this.AdminStok_Load);
            this.Stock.ResumeLayout(false);
            this.Stock.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.CantidadaggADMIN)).EndInit();
            this.ResumeLayout(false);

        }

        private void label4_Click(object sender, EventArgs e)
        {
            throw new NotImplementedException();
        }

        #endregion

        private System.Windows.Forms.Panel Stock;
        private System.Windows.Forms.TextBox TextBoxIdProductoADMIN;
        private System.Windows.Forms.TextBox textBoxdelPrecioADMIN;
        private System.Windows.Forms.Button AGREGAR;
        private System.Windows.Forms.NumericUpDown CantidadaggADMIN;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.ComboBox comboBoxnameproductsADMIN;
        private System.Windows.Forms.Label label2;
    }
}