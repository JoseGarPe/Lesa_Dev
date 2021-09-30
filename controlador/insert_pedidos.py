import xmlrpc.client


class Import():

    def __init__(self):
        host='https://pruebav2.indexseven.com'
        port=8069
        url = "https://pruebav2.indexseven.com/xmlrpc"
        self.db = 'prod1'
        self.username = 'admin@lesa.bz'
        self.password = 'Adm1nCVMasi7!.'
        print ("URLL", url)
        common = xmlrpc.client.ServerProxy(url +'/common')
        self.uid = common.login(self.db, self.username, self.password)
        print ("UIDDD", self.uid)
        self.models = xmlrpc.client.ServerProxy(url +'/object')\

    def clientes(self):

        prodid = self.models.execute_kw(self.db, self.uid, self.password, 'sale.order', 'create', [{
            'partner_id':'1757',
            'partner_invoice_id':'1757',
            'partner_shipping_id':'1757',
            'pricelist_id':'722',
            'commitment_date':'2021-09-30 10:25:00',
            'x_studio_venta':'PEDIDO',
            'picking_policy':'direct',
            'date_order':'2021-09-30 10:15:00',
            'company_id':'4',
            'warehouse_id':'32',
            'team_id':'1',

            }])

        ped_name = self.models.execute_kw(self.db, self.uid, self.password, 'sale.order', 'search_read',
        [[['id', '=', prodid]]],
        {'fields': ['name'], 'limit':1})

        self.valor=ped_name
        return (self.valor)

        #return prodid


usuarios =  Import()
print (usuarios)

cl = usuarios.clientes()
print(cl)
