using NewsApp.Views.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace NewsApp.Views
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class PageMenu : ContentPage
    {
        public PageMenuModel Model { get; set; }

        public PageMenu()
        {
            InitializeComponent();

            if (Model == null)
            {
                Model = new PageMenuModel();
            }

            BindingContext = Model;
        }

        private void ListView_ItemSelected(object sender, SelectedItemChangedEventArgs e)
        {
            if (e.SelectedItem != null)
            {
                App.Nav.PopAsync();

                var item = e.SelectedItem as MenuItemModel;
                if (item.Command != null && item.Command.CanExecute(null))
                {
                    item.Command.Execute(null);
                }

                App.Master.IsPresented = false;

                listView.SelectedItem = null;
            }
        }
    }
}