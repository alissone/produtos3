import graphene

class Website(graphene.ObjectType):
    url = graphene.String(required=True)
    title = graphene.String()
    description = graphene.String()
    image = graphene.String()

import graphene

class Query(graphene.ObjectType):
    website = graphene.Field(Website, url=graphene.String())

    def resolve_website(self, info, url):
        extracted = extract(url)
        return Website(url=url,
                       title=extracted.title,
                       description=extracted.description,
                       image=extracted.image)

schema = graphene.Schema(query=Query)
query = r'''
{
  website(url: "https://lethain.com/migrations") {
      title
      image
  }
}
'''
schema.execute(query, variable_values={"id": 6})



# import graphene
# from graphql_relay.node.node import to_global_id

# global_id = to_global_id("UsersNode", 6)
# query = '''
#     query {{
#         product(id: "{0}") {{
#             name
#             id
#             quantity
#             price
#         }}
#     }}
# '''.format(global_id)

# # schema = graphene.Schema(query=query)
# # result = schema.execute(query)
# result = schema.execute(query, variable_values={"id": 6})


# print('errors', result.errors)
# print('data', result.data)

# import graphene

# class CreateProduct(graphene.Mutation):
#     class Arguments:
#         name = graphene.String()
#         price = graphene.Float()
#         quantity = graphene.Int()

#     ok = graphene.Boolean()
#     product = graphene.Field(lambda: Product)

#     def mutate(root, info, name):
#         product = Product(name=name)
#         ok = True
#         return CreateProduct(product=product, ok=ok)

# class Product(graphene.ObjectType):
#     name = graphene.String()
#     age = graphene.Int()

# class MutationTest(graphene.ObjectType):
#     create_product = CreateProduct.Field()

# # We must define a query for our schema
# class Query(graphene.ObjectType):
#     Product = graphene.Field(Product)

# schema = graphene.Schema(query=Query, mutation=MutationTest)
# print(schema)
# schema.execute(r'''
#     mutation {
#   createProduct(
#     name: "TesteGraphQL",
#     price: 20.00,
#     quantity: 2
#   )
#   {
#     id
#     name
#   }
# }
# '''
# )