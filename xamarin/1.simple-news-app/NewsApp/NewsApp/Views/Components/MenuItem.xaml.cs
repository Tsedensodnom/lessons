﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace NewsApp.Views.Components
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class MenuItem : ContentView
    {
        public MenuItem()
        {
            InitializeComponent();
        }
    }
}